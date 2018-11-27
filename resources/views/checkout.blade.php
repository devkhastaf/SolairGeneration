@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-4"><!--Checkout-->
        <div class="text-center">
            <div class="text-2xl text-blue-darkest font-semibold">Payment</div>
            <div class="w-1/2 text-lg inline-block my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </div>
            <div class="lg:grid lg:grid-columns-12 lg:my-2" style="grid-gap: 2rem;">
                <div class="col-span-8 p-4 bg-white sm:my-6 shadow-md rounded-lg">
                    <form action="{{ route('checkout.pay') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <div class="text-2xl font-semibold text-blue-darkest my-2 lg:text-left">Billing Info</div>
                        @include('partials.notification')
                        <div class="text-blue-darkest text-lg font-semibold my-2">Payment method</div>
                        <div class="mx-auto py-4 flex justify-center flex-wrap">
                            <div class="w-48 h-24 mx-2 bg-grey-lighter flex justify-center items-center relative rounded-lg shadow-md hover:cursor-pointer"
                                 tabindex="0">
                                <svg version="1.1" viewBox="0 0 160 100" width="64px" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"><title/>
                                    <defs/>
                                    <g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
                                        <g id="Paypal" transform="translate(-1.000000, 0.000000)">
                                            <path d="M149,1.01146687e-06 C141,1.76644588e-06 56.3007812,-1.60318373e-06 9,1.01146687e-06 C5,1.23257532e-06 1,4.00000101 1,8.00000101 L1,88.000001 C0.999999537,96.000001 5,100.000001 13,100.000001 C57.6232096,100.000001 141,100.000002 149,100.000001 C157,100.000001 161,96.000001 161,88.000001 L161,12.000001 C161,4.00000101 157,1.01146687e-06 149,1.01146687e-06 Z M149,1.01146687e-06"
                                                  fill="#F6F6F6" id="Rectangle-1"/>
                                            <path d="M152.76461,33.4570312 L148.564238,33.4570312 C148.56187,33.4570312 148.559501,33.4577998 148.557923,33.4577998 L148.555554,33.4570312 C147.594071,33.4570312 146.618378,34.174116 146.346037,35.0864199 C146.334986,35.1233117 146.31604,35.1586664 146.307357,35.1970954 C146.307357,35.1970954 146.207104,35.6421029 146.033437,36.4114511 L140.263746,61.8744917 C140.130339,62.4501578 140.041137,62.8252246 140.014298,62.9228342 L140.025349,62.9366686 C139.825632,63.8266838 140.375051,64.562983 141.27733,64.645221 L141.289171,64.6621297 L145.649001,64.6621297 C146.604169,64.6621297 147.573547,63.9519622 147.854571,63.051187 C147.867991,63.007378 147.889305,62.9666432 147.899567,62.9228342 L154.193416,35.1955582 L154.183943,35.1924839 C154.397869,34.2440567 153.7703,33.4570312 152.76461,33.4570312 Z M131.219833,58.4825217 C130.637259,58.8399112 130.021531,59.1458059 129.376595,59.4063543 C128.509839,59.7468351 127.688078,59.9251455 126.927891,59.9251455 C125.761165,59.9251455 124.864412,59.7645124 124.258156,59.4209573 C123.651111,59.0950796 123.332985,58.5286365 123.343247,57.7177851 C123.343247,56.7816552 123.565067,56.0553475 124.024495,55.48583 C124.487081,54.9378328 125.174644,54.4966681 126.027191,54.1677161 C126.875001,53.8879531 127.917793,53.6573793 129.12162,53.4921347 C130.19204,53.3607076 132.308409,53.1232165 132.579172,53.1216793 C132.849934,53.1193736 133.029916,52.974112 132.909139,53.6765938 C132.85546,53.9817198 132.244468,56.4242657 131.964233,57.5348631 C131.882925,57.8676581 131.428233,58.3526318 131.219833,58.4825217 C131.219833,58.4825217 131.428233,58.3526318 131.219833,58.4825217 Z M139.52585,41.3155288 C137.743396,40.3471185 134.955251,39.8575334 131.140104,39.8575334 C129.253449,39.8575334 127.357322,40.0051006 125.454879,40.2925494 C124.058439,40.5008345 123.914769,40.5354205 123.047224,40.719111 C121.262401,41.0972522 120.986902,42.8373163 120.986902,42.8373163 L120.413801,45.1322948 C120.08857,46.6002818 120.947432,46.539564 121.330289,46.4258142 C122.109422,46.1967775 122.531749,45.969278 124.121591,45.6188057 C125.641177,45.2829364 127.246807,45.0316109 128.527995,45.0416025 C130.406756,45.0416025 131.835561,45.2422017 132.785204,45.6280287 C133.735636,46.0315329 134.206115,46.718643 134.206115,47.7016563 C134.209273,47.9353045 134.215588,48.1558868 134.128755,48.3488003 C134.050604,48.5286479 133.900619,48.7023469 133.451453,48.7615275 C130.769878,48.9167806 128.845332,49.1550402 126.527667,49.4839923 C124.240789,49.7975727 122.239672,50.3348099 120.566944,51.0787949 C118.7837,51.8489116 117.449622,52.8795768 116.529976,54.1853934 C115.634802,55.4973587 115.184847,57.0860127 115.182478,58.9575039 C115.182478,60.7260054 115.835308,62.1686293 117.098341,63.2884497 C118.376372,64.3936671 120.038838,64.9408957 122.050217,64.9408957 C123.306935,64.9324413 124.290521,64.8440547 124.995451,64.6726614 C125.693277,64.5012682 126.454254,64.2576285 127.257858,63.9186849 C127.858588,63.6742766 128.506681,63.32073 129.191087,62.8772596 C129.876282,62.432252 130.350709,62.1163658 130.959333,61.7282332 L130.981436,61.765125 L130.810137,62.5006556 C130.809347,62.5075728 130.799085,62.5114157 130.799085,62.5183329 L130.804611,62.5321674 C130.608841,63.4183396 131.155892,64.1554074 132.057381,64.2422569 L132.068433,64.2576285 L132.148162,64.2576285 L132.151319,64.2614714 C132.749681,64.2614714 134.803688,64.2607028 135.763592,64.2576285 L136.433789,64.2576285 C136.477995,64.2576285 136.482731,64.2445626 136.500098,64.2345711 C137.420533,64.1246642 138.303077,63.3945136 138.510688,62.5183329 L141.939031,48.1113092 C142.017971,47.7723656 142.080333,47.3811586 142.117435,46.930771 C142.160062,46.4757719 142.210583,46.1014737 142.195585,45.8309337 C142.203479,43.7918921 141.303568,42.2847076 139.52585,41.3155288 L139.52585,41.3155288 Z M118.881377,38.0339225 C118.296435,36.9256308 117.413102,36.0333099 116.296108,35.338514 C115.150695,34.6452552 113.789778,34.1618187 112.214145,33.87975 C110.655878,33.6138215 108.803168,33.4616427 106.692325,33.4570312 L96.8706685,33.4616427 C95.8594532,33.4785515 94.8671833,34.2517425 94.6335223,35.2040126 L88.0302308,63.1818455 C87.7894653,64.1325784 88.4462421,64.9249839 89.4393014,64.9196039 L94.1519912,64.9111495 C95.1513656,64.9196039 96.1696855,64.1325784 96.4057147,63.1818455 L97.9987144,56.3922137 C98.2221133,55.4407122 99.238065,54.6436952 100.254017,54.6575297 L101.59362,54.6575297 C107.341997,54.6575297 111.798923,53.5077347 114.990448,51.2189048 C118.174079,48.9185461 119.776551,45.9011028 119.776551,42.1481289 C119.766289,40.5095172 119.479739,39.1291484 118.881377,38.0339225 Z M108.748699,47.1846307 C107.341997,48.1807098 105.367719,48.6802865 102.827445,48.6802865 L101.65914,48.6802865 C100.648714,48.6918152 99.9958844,47.8963353 100.235861,46.9425281 L101.644142,41.0044825 C101.854121,40.0652783 102.879545,39.2659555 103.875762,39.2736413 L105.41903,39.2659555 C107.22043,39.2736413 108.567928,39.5672387 109.498625,40.1505906 C110.413534,40.7408597 110.857174,41.6562379 110.864279,42.8759737 C110.868226,44.7351676 110.161717,46.1654942 108.748699,47.1846307"
                                                  fill="#306FC5" id="pal"/>
                                            <path d="M85.8355974,39.8576594 C84.9412822,39.8576594 83.7682833,40.5665697 83.2130217,41.423313 C83.2130217,41.423313 77.2307975,51.4690748 76.643245,52.4729634 C76.3238468,53.0127254 76.0002367,52.6696156 75.9461846,52.4688378 C75.9026622,52.2247416 74.0922707,41.4893221 74.0922707,41.4893221 C73.8886982,40.6250153 72.9670061,39.8831004 71.8143644,39.8865383 L68.0840734,39.8920391 C67.1848445,39.8920391 66.6239671,40.5975115 66.8240297,41.4501292 C66.8240297,41.4501292 69.675449,57.2813147 70.2314126,61.0046412 C70.5086924,63.063988 70.2026316,63.4291009 70.2026316,63.4291009 L66.5060354,69.7425975 C65.9648133,70.5986532 66.2610464,71.3 67.1560635,71.3 L71.4788207,71.296562 C72.3738379,71.296562 73.5594723,70.5986532 74.0922707,69.7412223 L90.7220399,42.1913565 C90.7220399,42.1913565 92.3127135,39.8377191 90.8455874,39.8576594 C89.8452741,39.8714113 85.8355974,39.8576594 85.8355974,39.8576594 Z M54.6140586,58.4825217 C54.0314849,58.8399112 53.416546,59.1442687 52.7716101,59.4055858 C51.904854,59.7445293 51.0791466,59.924377 50.3213271,59.924377 C49.1577585,59.924377 48.2586373,59.7629752 47.6515923,59.4209573 C47.0453367,59.094311 46.7256316,58.5278679 46.7358938,57.7162479 C46.7358938,56.7824237 46.960082,56.0538103 47.4187207,55.4850614 C47.8820957,54.9362956 48.5665014,54.4943624 49.4190483,54.1661789 C50.269227,53.8848788 51.3151758,53.6573793 52.5150566,53.4921347 C53.5854766,53.3607076 55.7042135,53.1239851 55.9741867,53.1201422 C56.2425811,53.1193736 56.4233526,52.9725749 56.3025751,53.6750566 C56.250475,53.9801827 55.6386937,56.4242657 55.3584584,57.5340945 C55.2739931,57.8684266 54.8193014,58.3534003 54.6140586,58.4825217 C54.6140586,58.4825217 54.8193014,58.3534003 54.6140586,58.4825217 Z M62.9200757,41.3147602 C61.1376212,40.34635 58.3502665,39.8575334 54.5351191,39.8575334 C52.647675,39.8575334 50.7523369,40.0035635 48.8491049,40.2917808 C47.4502965,40.4985287 47.3097841,40.5338834 46.4414493,40.7175739 C44.6558372,41.0972522 44.3811276,42.8357791 44.3811276,42.8357791 L43.8080267,45.1322948 C43.4835852,46.5995132 44.3432367,46.5387954 44.7245146,46.4250457 C45.5020689,46.1960089 45.9267636,45.969278 47.5166057,45.6172685 C49.0338234,45.2829364 50.6418216,45.0323795 51.9214313,45.0408339 C53.8017709,45.0408339 55.2289976,45.2406646 56.1786401,45.6264915 C57.1298614,46.0299958 57.5979728,46.718643 57.5979728,47.7008877 C57.6042879,47.9345359 57.6090243,48.1558868 57.524559,48.3472631 C57.4448301,48.5286479 57.2932662,48.7015783 56.8441003,48.7599903 C54.1656821,48.9175492 52.2419258,49.1550402 49.9203143,49.4839923 C47.6334362,49.7975727 45.6331086,50.3348099 43.9595906,51.0780263 C42.1763466,51.848143 40.8438474,52.8803453 39.9257807,54.1853934 C39.0274489,55.4965901 38.578283,57.0852441 38.5767042,58.9575039 C38.5767042,60.7252368 39.2303235,62.1686293 40.4917771,63.2876811 C41.7705975,64.3928985 43.4314851,64.9408957 45.4428643,64.9408957 C46.700371,64.9324413 47.6831681,64.8425175 48.3904663,64.6726614 C49.0875023,64.499731 49.8492687,64.2576285 50.6497155,63.9186849 C51.2528135,63.6742766 51.8993283,63.3191928 52.5845234,62.876491 C53.2681397,62.432252 53.7449344,62.1163658 54.3559264,61.7282332 L54.3748719,61.7643564 L54.2035731,62.4991185 C54.2019943,62.5060357 54.1925216,62.5106472 54.1925216,62.5191015 L54.1996261,62.5306302 C54.0038561,63.4191082 54.5493282,64.1554074 55.451607,64.2407197 L55.4626586,64.2576285 L55.5415981,64.2576285 L55.5439663,64.2630085 C56.1439067,64.2630085 58.1987026,64.2599342 59.1562391,64.2576285 L59.827225,64.2576285 C59.8722206,64.2576285 59.8785357,64.2430255 59.8927449,64.2338025 C60.8155479,64.1208213 61.6949343,63.3922079 61.9049134,62.5191015 L65.3332571,48.1105406 C65.4106178,47.7723656 65.4737695,47.3811586 65.5085029,46.9315396 C65.5542878,46.4742347 65.6040197,46.1014737 65.5906,45.8317022 C65.5984939,43.7911235 64.6970045,42.283939 62.9200757,41.3147602 Z M41.47554,38.0339225 C40.8905981,36.9256308 40.0072648,36.0333099 38.8902705,35.338514 C37.7448579,34.6452552 36.3839405,34.1618187 34.8083075,33.87975 C33.2500412,33.6138215 31.3973305,33.4616427 29.2864875,33.4570312 L19.4648315,33.4616427 C18.4536161,33.4785515 17.4613462,34.2517425 17.2276852,35.2040126 L10.6243937,63.1818455 C10.3836282,64.1325784 11.0404051,64.9249839 12.0334643,64.9196039 L16.7461541,64.9111495 C17.7455285,64.9196039 18.7638485,64.1325784 18.9998776,63.1818455 L20.5928773,56.3922137 C20.8162762,55.4407122 21.8322279,54.6436952 22.8481796,54.6575297 L24.1877834,54.6575297 C29.9361598,54.6575297 34.3930856,53.5077347 37.5846107,51.2189048 C40.7682418,48.9185461 42.3707142,45.9011028 42.3707142,42.1481289 C42.3604521,40.5095172 42.0739016,39.1291484 41.47554,38.0339225 Z M31.3428622,47.1846307 C29.9361598,48.1807098 27.9618822,48.6802865 25.4216082,48.6802865 L24.2533032,48.6802865 C23.2428773,48.6918152 22.5900474,47.8963353 22.8300235,46.9425281 L24.2383047,41.0044825 C24.4482839,40.0652783 25.4737083,39.2659555 26.4699252,39.2736413 L28.0131929,39.2659555 C29.814593,39.2736413 31.1620907,39.5672387 32.0927877,40.1505906 C33.0076969,40.7408597 33.451337,41.6562379 33.4584416,42.8759737 C33.4623885,44.7351676 32.7558798,46.1654942 31.3428622,47.1846307"
                                                  fill="#265697" id="pay"/>
                                        </g>
                                    </g>
                                </svg>
                                <svg class="absolute inline-block pin-t pin-r" height="32px"
                                     style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32"
                                     width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1"/>
                                    <g id="check_x5F_alt">
                                        <path d="M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M13.52,23.383   L6.158,16.02l2.828-2.828l4.533,4.535l9.617-9.617l2.828,2.828L13.52,23.383z"
                                              style="fill:#4E4E50;"/>
                                    </g></svg>
                            </div>
                            <div class="w-48 h-24 mx-2 bg-grey-lighter flex justify-center items-center relative rounded-lg shadow-md hover:cursor-pointer"
                                 tabindex="0">
                                <svg class="justify-center items-center" version="1.1" id="Layer_1" width="64px"
                                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     x="0px" y="0px"
                                     viewBox="0 0 468 222.5" style="enable-background:new 0 0 468 222.5;"
                                     xml:space="preserve">
                      <style type="text/css">
                          .st0 {
                              fill-rule: evenodd;
                              clip-rule: evenodd;
                              fill: #6772E5;
                          }
                      </style>
                                    <g>
                                        <path class="st0" d="M414,113.4c0-25.6-12.4-45.8-36.1-45.8c-23.8,0-38.2,20.2-38.2,45.6c0,30.1,17,45.3,41.4,45.3
                              c11.9,0,20.9-2.7,27.7-6.5V132c-6.8,3.4-14.6,5.5-24.5,5.5c-9.7,0-18.3-3.4-19.4-15.2h48.9C413.8,121,414,115.8,414,113.4z
                               M364.6,103.9c0-11.3,6.9-16,13.2-16c6.1,0,12.6,4.7,12.6,16H364.6z"/>
                                        <path class="st0" d="M301.1,67.6c-9.8,0-16.1,4.6-19.6,7.8l-1.3-6.2h-22l0,116.6l25-5.3l0.1-28.3c3.6,2.6,8.9,6.3,17.7,6.3
                              c17.9,0,34.2-14.4,34.2-46.1C335.1,83.4,318.6,67.6,301.1,67.6z M295.1,136.5c-5.9,0-9.4-2.1-11.8-4.7l-0.1-37.1
                              c2.6-2.9,6.2-4.9,11.9-4.9c9.1,0,15.4,10.2,15.4,23.3C310.5,126.5,304.3,136.5,295.1,136.5z"/>
                                        <polygon class="st0" points="223.8,61.7 248.9,56.3 248.9,36 223.8,41.3 	"/>
                                        <rect x="223.8" y="69.3" class="st0" width="25.1" height="87.5"/>
                                        <path class="st0"
                                              d="M196.9,76.7l-1.6-7.4h-21.6v87.5h25V97.5c5.9-7.7,15.9-6.3,19-5.2v-23C214.5,68.1,202.8,65.9,196.9,76.7z"/>
                                        <path class="st0" d="M146.9,47.6l-24.4,5.2l-0.1,80.1c0,14.8,11.1,25.7,25.9,25.7c8.2,0,14.2-1.5,17.5-3.3V135
                              c-3.2,1.3-19,5.9-19-8.9V90.6h19V69.3h-19L146.9,47.6z"/>
                                        <path class="st0" d="M79.3,94.7c0-3.9,3.2-5.4,8.5-5.4c7.6,0,17.2,2.3,24.8,6.4V72.2c-8.3-3.3-16.5-4.6-24.8-4.6
                              C67.5,67.6,54,78.2,54,95.9c0,27.6,38,23.2,38,35.1c0,4.6-4,6.1-9.6,6.1c-8.3,0-18.9-3.4-27.3-8v23.8c9.3,4,18.7,5.7,27.3,5.7
                              c20.8,0,35.1-10.3,35.1-28.2C117.4,100.6,79.3,105.9,79.3,94.7z"/>
                                    </g>
                      </svg>
                    <svg class="absolute inline-block pin-t pin-r" height="32px"
                         style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px"
                         xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1"/>
                        <g id="check_x5F_alt">
                            <path d="M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M13.52,23.383   L6.158,16.02l2.828-2.828l4.533,4.535l9.617-9.617l2.828,2.828L13.52,23.383z"
                                  style="fill:#4E4E50;"/>
                        </g></svg>
                            </div>
                        </div>
                        <div class="text-blue-darkest text-lg font-semibold my-4 lg:text-left">Billing Info</div>
                        <div class="lg:grid lg:grid-columns-2 sm:text-center" style="grid-gap: 2rem;">
                            <div class="lg:text-left">
                                <label for="name" class="text-left text-blue-darkest text-base font-semibold">Full
                                    Name</label><br>
                                <input type="text" name="name"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80  my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="Jhon Doe" id="name">
                            </div>
                            <div class="lg:text-left">
                                <label for="email"
                                       class="text-left text-blue-darkest text-base font-semibold">Email</label><br>
                                <input type="email" name="email"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80 my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="JhonDoe@example.com" id="email">
                            </div>
                            <div class="lg:text-left">
                                <label for="address"
                                       class="text-left text-blue-darkest text-base font-semibold">Address</label><br>
                                <input type="text" name="address"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80 my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="Stret 1 Bil 2 N° 10" id="address">
                            </div>
                            <div class="lg:text-left">
                                <label for="city"
                                       class="text-left text-blue-darkest text-base font-semibold">City</label><br>
                                <input type="text" name="city"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80 my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="Benguerir" id="city">
                            </div>
                            <div class="lg:text-left">
                                <label for="province"
                                       class="text-left text-blue-darkest text-base font-semibold">City</label><br>
                                <input type="text" name="province"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80 my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="Rhamna" id="province">
                            </div>
                            <div class="lg:text-left">
                                <label for="zipcode" class="text-left text-blue-darkest text-base font-semibold">Zip
                                    Code</label><br>
                                <input type="text" name="zipcode"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80 my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="43150" id="zipcode">
                            </div>
                            <div class="lg:text-left">
                                <label for="phone"
                                       class="text-left text-blue-darkest text-base font-semibold">Phone</label><br>
                                <input type="tel"
                                       class="bg-grey-light h-12 px-4 py-4 text-base font-semibold w-80 my-2 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                       placeholder="+21255555555" id="phone">
                            </div>
                        </div>
                        <div class="lg:text-left my-4">
                            <button type="submit" class="btn-red">Checkout</button>
                        </div>
                    </form>
                </div>
                <div class="col-span-4">
                    <div class="col-span-4">
                        <div class=" bg-white p-4 bg-white sm:my-6 shadow-md rounded-lg">
                            <div class="my-4 text-2xl font-semibold text-blue-darkest">Invoice</div>
                            <div>
                                <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                    <div class="flex-1 font-semibold">SubTotal</div>
                                    <div class="flex-1 w-16 text-right font-semibold">{{ presentPrice(Cart::subtotal()) }}</div>
                                </div>
                                @if(session()->has('coupon'))
                                    <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                        <div class="flex-1 font-semibold">
                                            Discount <span class="text-green">({{ session()->get('coupon')['name'] }}
                                                )</span>
                                            <form method="POST" action="{{ route('coupon.destroy') }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="text-red">Remove</button>
                                            </form>
                                        </div>
                                        <div class="flex-1 w-16 text-right font-semibold">
                                            -{{ presentPrice($discount) }}</div>
                                    </div>
                                @endif
                                <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                    <div class="flex-1 font-semibold">New SubTotal</div>
                                    <div class="flex-1 w-16 text-right font-semibold">{{ presentPrice($newSubtotal) }}</div>
                                </div>
                                <div class="flex border-b-1 py-4 border-solid border-blue-darkest ">
                                    <div class="flex-1 font-semibold">Tax <span
                                                class="font-semibold text-blue-darkest text-base opacity-75">20%</span>
                                    </div>
                                    <div class="flex-1 w-16 text-right font-semibold">{{ presentPrice($newTax) }}</div>
                                </div>
                                <p class="text-right text-blue-darkest opacity-75 font-semibold my-4">Total
                                    : {{ presentPrice($newTotal) }}</p>
                            </div>
                            @if(!session()->has('coupon'))
                                <div class="bg-white py-4 px-2 text-center mt-4 rounded-l">
                                    <form action="{{ route('coupon.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="text-lg font-semibold text-blue-darkest">Do you have a coupon code
                                            ?
                                        </div>
                                        <input type="text" name="coupon_code"
                                               class="bg-grey-light h-8 px-4 py-2 text-xs w-48 my-4 rounded-full focus:outline-none focus:border-blue border-2 border-transparent"
                                               placeholder="Coupon code">
                                        <button type="submit"
                                                class="btn-red text-white ml-2 hover:bg-blue hover:text-white">Apply
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-span-4 sm:my-6">
                        <div class="bg-white p-4 shadow-md rounded-lg">
                            <div class="text-2xl font-semibold text-blue-darkest">Vos Articles</div>
                            <div class="">
                                @if(Cart::count() > 0)
                                    @foreach(Cart::content() as $item)
                                        <div class="flex border-b-1 border-solid border-blue-darkest">
                                            <div class="flex-1 h-24 flex items-center">
                                                <img src="{{ productImage($item->model->image) }}" class="w-16 h-auto">
                                                <div class="ml-2 font-semibold text-base text-blue-darkest">{{ $item->model->name }}</div>
                                            </div>
                                            <div class="flex-1 h-24 flex items-center">
                                                <div class="ml-2 font-semibold text-base text-blue-darkest">{{ $item->qty }}</div>
                                            </div>
                                            <div class="text-right flex items-center text-base text-blue-darkest font-semibold">{{ presentPrice($item->model->price) }}</div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="flex my-4">
                                    <div class="flex-1 text-blue-darkest opacity-75 justify-end flex items-center text-lg font-semibold">
                                        Total: {{ presentPrice(Cart::subtotal()) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--End Checkout-->


    <div class="checkout">
        <h1>Checkout Page</h1>
        <div class="left">
            <form action="{{ route('checkout.pay') }}" method="POST" id="payment-form">
                {{ csrf_field() }}
                <h3>Billing Details</h3>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"><br>
                </div>
                <div>
                    <label for="name_on_card">Name on card</label>
                    <input type="text" name="name" id="name"><br>
                </div>
                <div>
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address"><br>
                </div>
                <div>
                    <label for="city">City</label>
                    <input type="text" name="city" id="city"><br>
                </div>
                <div>
                    <label for="province">Province</label>
                    <input type="text" name="province" id="province"><br>
                </div>
                <div>
                    <label for="zipcode">ZIP Code</label>
                    <input type="text" name="zipcode" id="zipcode"><br>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone"><br>
                </div>
                <h3>Payment Methods</h3>
                <div>
                    <fieldset id="mpay">
                        <label for="stripe">Stripe</label>
                        <input type="radio" name="mpay" id="stripe" value="stripe">
                        <label for="paypal">Paypal</label>
                        <input type="radio" name="mpay" id="paypal" value="paypal">
                    </fieldset>
                </div>
                <button type="submit" class="btn" id="complete-order">Complete Order</button>
            </form>
            <div class="right">
                <h2>Your Order</h2>
                <ul>
                    @foreach(Cart::content() as $item)
                        <li>{{ $item->model->name }} || {{ presentPrice($item->model->price) }} || {{ $item->qty }}</li>
                    @endforeach
                </ul>
                <table>
                    <tr style=" border: 1px solid black; padding: 15px;">
                        <td style=" border: 1px solid black; padding: 15px;">Subtotal</td>
                        <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice(Cart::subtotal()) }}</td>
                    </tr>
                    @if(session()->has('coupon'))
                        <tr style=" border: 1px solid black; padding: 15px;">
                            <td style=" border: 1px solid black; padding: 15px;">
                                Discount ({{ session()->get('coupon')['name'] }})
                                <form method="POST" action="{{ route('coupon.destroy') }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit">Remove</button>
                                </form>
                            </td>
                            <td style=" border: 1px solid black; padding: 15px;">-{{ presentPrice($discount) }}</td>
                        </tr>
                    @endif
                    <tr style=" border: 1px solid black; padding: 15px;">
                        <td style=" border: 1px solid black; padding: 15px;">New Subtotal</td>
                        <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice($newSubtotal) }}</td>
                    </tr>
                    <tr style=" border: 1px solid black; padding: 15px;">
                        <td style=" border: 1px solid black; padding: 15px;">Tax (20%)</td>
                        <td style=" border: 1px solid black; padding: 15px;">{{ presentPrice($newTax) }}</td>
                    </tr>
                    <tr style=" border: 1px solid black; padding: 15px;">
                        <td style=" border: 1px solid black; padding: 15px;"><strong>Total</strong></td>
                        <td style=" border: 1px solid black; padding: 15px;">
                            <strong>{{ presentPrice($newTotal) }}</strong></td>
                    </tr>
                </table>
                @if(!session()->has('coupon'))
                    <div>
                        <form action="{{ route('coupon.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="coupon_code" placeholder="Coupon code"/>
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        @endsection

        @section('extra-js')
            <script>

            </script>
@endsection