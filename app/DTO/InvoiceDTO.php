<?php

namespace App\DTO;

class InvoiceDTO extends GenericDTO 
{
    private $customer_id;
    private $program_id;
    private $total_price;
    private $expired_date;
    private $paid_date;
    private $reminder_count;
}