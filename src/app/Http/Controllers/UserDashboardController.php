<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Cookie;


class UserDashboardController extends Controller
{

    public function show(Request $request)
    {
       $this->getCookie($request);
       dd("UserDashboardController");
    }

    public function getCookie(Request $request) {
        $value = $request->cookie('jwt');                
        $apiURL = env('APP_JWT').'/api/profile';
        var_dump($value);
        var_dump($apiURL);
        $header1 = "Bearer ".$value;
        $postInput = [
        ];
        $headers = [
            'Authorization' => $header1,
            'Accept' => "application/json",
        ];
        $response = Http::withHeaders($headers)->post($apiURL, $postInput); 
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);   
        dd($responseBody);   
     }
}
