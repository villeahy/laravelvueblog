<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login(Request $request){
      $http = new Client();
      try {
        $response = $http->post(config('services.passport.login_endpoint'), [
          'form_params' => [
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'username' => $request->username,
            'password' => $request->password,
          ],
      ]);
      return json_decode((string) $response->getBody(), true);

      } catch (\Exception $e) {
        return $e;
      }


    }

    public function register(Request $request){

      $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:6'],
      ]);

      return User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);
    }

    public function logout(Request $request){

      auth()->user()->tokens->each(function($token, $key){
        $token->delete();
      });
      return response()->json('Logged out successfully', 200);
    }
}
