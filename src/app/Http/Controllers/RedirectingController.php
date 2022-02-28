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
use Redirect;


class RedirectingController extends Controller
{

    public function __construct()
    {
        
    }

    public function __invoke(Request $request)
    {   
         
        $apiURL = env('APP_JWT').'/api/login';
        $postInput = [
            'email' => $request->input("uname"),
            'password' => $request->input("psw"),
        ];
         
        $headers = [
            'X-header' => 'value'
        ];  
        $response = Http::withHeaders($headers)->post($apiURL, $postInput);                        
        $statusCode = $response->status();
        $responseBody = json_decode($response->getBody(), true);        
        $token=@$responseBody["access_token"];        
        // $tokenParts = explode(".", $token);
        // $tokenHeader = @base64_decode($tokenParts[0]);
        // $tokenPayload = @base64_decode($tokenParts[1]);
        // $jwtHeader = json_decode($tokenHeader);
        // $jwtPayload = json_decode($tokenPayload);
        $cookie = Cookie::make('jwt', $token);
        return Redirect::to('userdashboard')->withCookie($cookie);
    }


    public function getCookie(Request $request) {
        $value = $request->cookie('name');
        echo $value;        
     }

}
