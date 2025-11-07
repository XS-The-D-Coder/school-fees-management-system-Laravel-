<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['fee_id', 'amount', 'mpesa_receipt_number', 'phone_number', 'status', 'paid_at'];

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
