<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'ext_id',
        'customer_id',
        'program_id',
        'ext_program_id',
        'payment_url',
        'expired_date',
        'total_amount',
        'paid_date',
    ];

    protected $table = 'payment';

    protected $primaryKey = 'id';

    public $timestamp = false;
}
