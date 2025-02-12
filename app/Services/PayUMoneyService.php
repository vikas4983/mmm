<?php

namespace App\Services;

class PayUMoneyService
{
    protected $key;
    protected $salt;
    protected $endpoint;

    public function __construct()
    {
        $this->key = config('payumoney.key');
        $this->salt = config('payumoney.salt');
        $this->endpoint = config('payumoney.mode');
    }

    public function generateHash(array $data)
    {
        $hash_string = "{$data['key']}|{$data['txnid']}|{$data['amount']}|{$data['productinfo']}|{$data['firstname']}|{$data['email']}|||||||||||{$this->salt}";
        return strtolower(hash('sha512', $hash_string));
    }

    public function getEndpoint()
    {
        return $this->endpoint;
       
    }
}
