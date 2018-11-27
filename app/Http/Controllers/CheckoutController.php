<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\PayerInfo;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout')->with([
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
            'newTax' => $this->getNumbers()->get('newTax'),
            'newTotal' => $this->getNumbers()->get('newTotal')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request)
    {
        $info = $request->all();
        if($request->mpay == "stripe")
        {
            return view('payWithStripe')->with([
                'info' => $info,
                'discount' => $this->getNumbers()->get('discount'),
                'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
                'newTax' => $this->getNumbers()->get('newTax'),
                'newTotal' => $this->getNumbers()->get('newTotal')
            ]);
        } elseif ($request->mpay == "paypal")
        {
            return view('payWithPaypal')->with([
                'info' => $info,
                'discount' => $this->getNumbers()->get('discount'),
                'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
                'newTax' => $this->getNumbers()->get('newTax'),
                'newTotal' => $this->getNumbers()->get('newTotal')
            ]);
        } else
        {
            return redirect()->back()->withErrors('error', 'you should to choose the method of payment')->with([
                'discount' => $this->getNumbers()->get('discount'),
                'newSubtotal' => $this->getNumbers()->get('newSubtotal'),
                'newTax' => $this->getNumbers()->get('newTax'),
                'newTotal' => $this->getNumbers()->get('newTotal')
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payWithStripe(Request $request)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug . ',' . $item->qty;
        })->values()->toJson();


        try {
            $charge = Stripe::charges()->create([
               'amount' => $this->getNumbers()->get('newTotal') / 100,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    // Change to Order ID after we start using DB
                    'contnets' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('coupon'))->toJson()
                ],
            ]);

            $order = $this->addToOrdersTables($request, null);
            Mail::send(new OrderPlaced($order));

            // SUCCESSFUL
            Cart::instance('default')->destroy();
            session()->forget('coupon');

            // return back()->with('success_message', 'Thank you! Your payment has been successfully accepted');
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted');
        }catch (CardErrorException $e) {
            $this->addToOrdersTables($request, $e->getMessage());
            return back()->withErrors('Error' . $e->getMessage());
        }
    }

    /**
     *
     *
     *
     *
     *
     */
    public function payWithPaypal(Request $request)
    {

        $apiContext = new ApiContext(new OAuthTokenCredential(
            Config::get('paypal.client_id'),
            Config::get('paypal.secret')
        ));

        $payment = new Payment();
        $list = new ItemList();

        foreach (Cart::content() as $product){
            $item = (new Item())
                    ->setName($product->model->name)
                    ->setPrice($product->model->price / 100)
                    ->setDescription($product->model->details)
                    ->setCurrency('EUR')
                    ->setQuantity($product->qty);
            $list->addItem($item);

        }

        $details = (new Details())
                ->setSubtotal($this->getNumbers()->get('newSubtotalForPaypal') / 100)
                ->setTax(bcdiv($this->getNumbers()->get('newTax') / 100, 1, 2))
                ->setGiftWrap($this->getNumbers()->get('discount') / 100);

        $amount = (new Amount())
                ->setTotal(bcdiv($this->getNumbers()->get('newTotal') / 100, 1, 2))
                ->setCurrency('EUR')
                ->setDetails($details);

        //echo $amount;
        //dd($list);

        $transaction = (new Transaction())
                    ->setItemList($list)
                    ->setDescription('Buy from SolairGeneration')
                    ->setAmount($amount)
                    ->setCustom('demo-1');

        $payment->setTransactions([$transaction]);
        $payment->setIntent('sale');
        $redirectUrls =  (new RedirectUrls())
            ->setReturnUrl('http://localhost:8000/payWithPaypal')
            ->setCancelUrl('http://localhost:8000/checkout');

        $payment->setRedirectUrls($redirectUrls);
        $payer = (new Payer())
                ->setPaymentMethod('paypal');
        $payerInfo = (new PayerInfo())
                    ->setEmail($request->emailpaypal);
        $payer->setPayerInfo($payerInfo);
        $payment->setPayer($payer);

        try {
            $payment->create($apiContext);
            return response()->json($payment->getId());
        } catch (PayPalConnectionException $e) {
            dd($e->getData());
        }

    }

    /**
     *
     *
     *
     *
     */
    public function paypal(Request $request)
    {
        $apiContext = new ApiContext(new OAuthTokenCredential(
            Config::get('paypal.client_id'),
            Config::get('paypal.secret')
        ));

        $payment = Payment::get($request->paymentId, $apiContext);
        $execution = (new PaymentExecution())
                    ->setPayerId($request->PayerID)
                    ->setTransactions($payment->getTransactions());



        try {
            $payment->execute($execution, $apiContext);
            dd($payment);
        } catch (PayPalConnectionException $e) {
            var_dump(json_decode($e->getData()));
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['name'] ?? null;
        $newSubtotal = (Cart::subtotal() - $discount);
        $newSubtotalForPaypal = Cart::subtotal();
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal +  $newTax;

        return collect([
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newSubtotalForPaypal' => $newSubtotalForPaypal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }

    protected function addToOrdersTables(Request $request, $error)
    {
        // Insert to orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->zipcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->nameoncard,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubtotal'),
            'billing_tax' => $this->getNumbers()->get('newTax'),
            'billing_total' => $this->getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        // Insert to order_product table
        foreach (Cart::content() as $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }
        return $order;
    }

}
