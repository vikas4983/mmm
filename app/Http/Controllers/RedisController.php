<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RedisController extends Controller
{
   public function testRedis(){
    $users = ['vikas', 'vipin', 'yadu'];
    Cache::put('test_key', $users, 10);
    $value = Cache::get('test_key');
    return $value;
   }
}
