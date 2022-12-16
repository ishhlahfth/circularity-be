<?php

namespace App\BusinessLayer;

use App\DTO\CustomerDTO;
use App\Models\Customer;
use App\PresentationLayer\ResponseCreatorPresentationLayer;
use Exception;

class CustomerBusinessLayer extends GenericBusinessLayer 
{
    public function getListCustomers(CustomerDTO $params)
    {
        $response = null;
        try {
            $offset = $params->getOffset();
            $limit = $params->getLimit();
            $order = $params->getOrder();

            $rows = Customer::orderBy('created_at', $order)->offset($offset)->limit($limit)->get();
            $count = count($rows);
            $data = [
                'count' => $count,
                'rows' => $rows
            ];

            if ($data != null) {
                $response = new ResponseCreatorPresentationLayer(200, 'Data ditemukan', $data);
            } else {
                $response = new ResponseCreatorPresentationLayer(200, 'Data tidak ditemukan!', []);
            }

        } catch (Exception $e) {
            $response = new ResponseCreatorPresentationLayer(500, 'Terjadi Kesalahan Server', null);
        }
        
        return $response->getResponse();
    }
}