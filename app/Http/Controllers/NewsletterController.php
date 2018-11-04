<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    function store(Request $request)
    {
        // Check if the email is in the database
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        // Insert the email to database
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->save();
        return back();
    }
}
