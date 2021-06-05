<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable=[
        'status',
        'comment',
        'date_quotation',
        'valid_until',
        'tax'
        ];
}
