<?php

namespace App\BusinessLayer;

use App\DTO\CustomerDTO;
use App\DTO\PaymentDTO;
use App\Mail\Payment as MailPayment;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Program;
use App\PresentationLayer\ResponseCreatorPresentationLayer;
use DateTime;
use \Stripe\StripeClient;
use Exception;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\ErrorHandler\ThrowableUtils;
use Throwable;

class PaymentBusinessLayer extends GenericBusinessLayer
{
    public function generatePayment(PaymentDTO $params) {
        $response = null;
        $stripe = new StripeClient(env('STRIPE_SECRET', ''));
        try {
            $cust = Customer::create([
              'name' => $params->getName(),
              'phone' => $params->getWhatsapp(),
              'whatsapp' => $params->getWhatsapp(),
              'email' => $params->getEmail(),
            ]);

            $programs = Program::find($params->getProgramId());
            $price_id = $programs->price_id;
            // var_dump($price_id);

            $stripeData = $stripe->checkout->sessions->create([
                'success_url' => 'https://www.circularity.coach/finish_payment',
                'cancel_url' => 'https://www.circularity.coach',
                'line_items' => [
                  [
                    'price' => $price_id,
                    'quantity' => 1,
                  ],
                ],
                'mode' => 'payment',
            ]);

            $payment = Payment::create([
              'ext_id' => $stripeData->id,
              'customer_id' => $cust->id,
              'program_id' => $programs->id,
              'ext_program_id' => $programs->ext_id,
              'payment_url' => $stripeData->url,
              'total_amount' => $programs->price,
            ]);
            $email = $cust->email;
            $exp = new DateTime('@'.strval($stripeData->expires_at));
            $details = [
              'name' => $cust->name,
              'programName' => $programs->title,
              'reffCode' => $payment->id,
              'amount' => $programs->price,
              'expiredDate' => $exp->format('Y-m-d H:i:s'),
              'url' => $stripeData->url,
            ];
            Mail::to($email)->send(new MailPayment($details));

            $response = new ResponseCreatorPresentationLayer(200, 'Payment Successfully Made', $payment);
        } catch (ThrowableUtils $e) {
            $response = new ResponseCreatorPresentationLayer(500, 'Error Server', $e);
        }
        return $response->getResponse();
    }
}