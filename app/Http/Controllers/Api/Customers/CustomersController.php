<?php

namespace App\Http\Controllers\Api\Customers;

use App\Models\Customer;
use App\BusinessLayer\CustomerBusinessLayer;
use App\DTO\CustomerDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    private $customerBusinessLayer;

    public function __construct() {
        $this->customerBusinessLayer = new CustomerBusinessLayer();
    }

    public function getAllCustomers(Request $request) {
        $params = new CustomerDTO();
        $params->setOffset($request->input('offset'));
        $params->setLimit($request->input('limit'));
        $params->setOrder($request->input('order'));

        $result = $this->customerBusinessLayer->getListCustomers($params);
        return response()->json($result, $result['code']);
    }
}