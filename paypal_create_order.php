<?php

// echo "Sending Create Order request to Paypal<br/>";

// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "https://api.sandbox.paypal.com/v2/checkout/orders",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "POST",
//   CURLOPT_POSTFIELDS => '{
//   "intent": "CAPTURE",
//   "purchase_units": [
//     {
//       "reference_id": "PUHF",
//       "amount": {
//         "currency_code": "USD",
//         "value": "100.00"
//       }
//     }
//   ],
//   "application_context": {
//     "return_url": "",
//     "cancel_url": ""
//   }
// }',
//   CURLOPT_HTTPHEADER => array(
//     'accept: application/json',
//     'accept-language: en_US',
//     'authorization: Bearer A21AAJlIUDbqJ27Wm18x_1AWkBArURm3--O7KwfZ1Ttz0BIhQYrzQmtmnUgboJtjaRD8FLxLWdui7fFh17MseB9HaRUnXl1bg',
//     'content-type: application/json'
//   ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo "Output: " . $response;
// }

// output exapmle:

// {
//   "id": "9NL58551R3292782S",
//   "status": "CREATED",
//   "links": [
//     {
//       "href": "https://api.sandbox.paypal.com/v2/checkout/orders/9NL58551R3292782S",
//       "rel": "self",
//       "method": "GET"
//     },
//     {
//       "href": "https://www.sandbox.paypal.com/checkoutnow?token=9NL58551R3292782S",
//       "rel": "approve",
//       "method": "GET"
//     },
//     {
//       "href": "https://api.sandbox.paypal.com/v2/checkout/orders/9NL58551R3292782S",
//       "rel": "update",
//       "method": "PATCH"
//     },
//     {
//       "href": "https://api.sandbox.paypal.com/v2/checkout/orders/9NL58551R3292782S/capture",
//       "rel": "capture",
//       "method": "POST"
//     }
//   ]
// }

//<a href=""https://www.sand box.paypal.com/checkoutnow?token=9NL58551R3292782S">Please approve at your paypal account</a>

?>
<div id="smart-button-container">
    <div style="text-align: center;">
        <div id="paypal-button-container"></div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=AW7pfvAPd_B03a0GQNJkAWVmQrO9vrBQIEE5ABeS0EtFIm5xIFf_lXdsGhSIo-6mBv8cvNbSM9x1Inbl&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'pill',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "amount": {
                            "currency_code": "USD",
                            "value": 1
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {

                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    // Show a success message within this page, e.g.
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<h3>Thank you for your payment!</h3>';

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>