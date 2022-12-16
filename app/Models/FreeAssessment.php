<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeAssessment extends Model
{
    use HasFactory;

    protected $table = 'freeassessment';

    protected $primaryKey = 'id';

    public $timestamp = false;

}
