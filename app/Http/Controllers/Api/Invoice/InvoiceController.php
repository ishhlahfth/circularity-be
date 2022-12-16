<?php

namespace App\Http\Controllers\Api\Invoice;

use App\BusinessLayer\InvoiceBusinessLayer;
use App\BusinessLayer\PaymentBusinessLayer;
use App\DTO\PaymentDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    private $invoiceBusinessLayer;

    public function __construct() {
        $this->paymentBusinessLayer = new PaymentBusinessLayer();
    }

    public function generatePayment(Request $request) {
        $params = new PaymentDTO();
        $params->setName($request->input('name'));
        $params->setEmail($request->input('email'));
        $params->setWhatsapp($request->input('whatsapp'));
        $params->setProgramId($request->input('program_id'));

        $result = $this->paymentBusinessLayer->generatePayment($params);
        return response()->json($result, $result['code']);
    }
}