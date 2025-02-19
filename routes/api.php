<?php

use App\Mail\TestingMail;
use App\Mail\UserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
// use App\Traits\UserEmailTemplateTrait;
use App\Traits\UserEmailTemplateTrait;

Route::get('/testing', function (Request $request) {
    return [User::all()];
});

Route::get('/email', function (Request $request) {
    $user = auth()->user();
    Mail::to($user->email)->send(new TestingMail($user));

    return "Email sent";
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
