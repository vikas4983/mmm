<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazorPayPaymentGateway extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'plan_id', 'name', 'email', 'phone', 'amount', 'order_id', 'razorpay_payment_id','expiry_date', 'status'];
}
