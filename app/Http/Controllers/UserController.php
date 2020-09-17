<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendCode;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class UserController extends  Controller
{

    /**
     *  Criar um usuario
     * 
     * @param Request $request
     */
    public function create(Request $request)
    {
        $listForConsult = [];
        
        if(! is_null($request->input('email'))){
            array_push($listForConsult, $request->input('email'));
        }

        if(! is_null($request->input('cpf'))){
            array_push($listForConsult, $request->input('cpf'));
        }

        $emptyUser = User::checkListUserInDatabase($listForConsult);

        if($emptyUser){
            return Response(["message" => "Email ou CPF já cadastrado"], 400);
        }

        $user = User::createNewUser($request->all());

        $accessToken = $user->generateNewToken();

        return Response(['token' => $accessToken], 201);

    }


    public function existEmail($email){

        $user = User::where('email', $email)->first();

        if($user){
            return Response([], 200);
        }else{
            return Response(["message" => "Email não cadastrado"], 401);
        }
    }


    public function update(Request $request)
    {

        $user  = User::getUserForToken();
        
        $user->update($request->all());
        
        return  $user;
    }


    public function login(Request $request){

        $indentificador = $request->input('email');

        if( is_null($indentificador)){
            $indentificador = $request->input('cpf');
        }

        $user = User::getUserIndentification($indentificador);

        
        if(is_null($user)){
            return  Response(["message" => "“Usuário não encontrado"], 400);
        }

        if($user->validatePassword($request->input('password'))){
            //dd( $user->createToken('MyApp'));
            $token =  $user->generateNewToken();

            return Response(['token' => $token], 200);
       
        }else{
            return response()->json(['error'=> 'E-mail ou senha incorreto' ], 401);
        }
    }



    public function loginCode(Request $request)
    {
                
        $indentificador = $request->input('email');

        if( is_null($indentificador)){
            $indentificador = $request->input('cpf');
        }

        $user = User::getUserIndentification($indentificador);

        if(is_null($user)){
            return  Response(["message" => "Usuário não encontrado"], 400);
        }


        Mail::to($user->email )->send(new SendCode($user));

        return Response([], 200);
    }


    public function loginRedesocialFacebook(Request $request){

        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response(["message" => 'Dados inválidos'], 400);
        }

        $token = $request->input('token');
        

        try{
            $socialUser = Socialite::driver('facebook')->userFromToken($token);
        }catch(Exception $e){
            return Response(["message" => "Token do $provider não é valido"], 400);
        }

        $fullNameArray = explode(" ", $socialUser->name);


        $user =  User::where('email', $socialUser->email)->first();

        if($user === null){

            $user = User::create(
                [
                    'email' => $socialUser->email,
                    'name' => $fullNameArray[0],
                    "surname" => $fullNameArray[1],
                ]
            );

            $token =  $user->generateNewToken();

            return Response(['user' => $user, 'token' => $token], 200);
        }

        $user->provider_oauth  = $request->provider_oauth;
        $user->provider_oauth_code  = $request->provider_oauth_code; 
        $user->save();

        $token =  $user->generateNewToken();
        return Response(['user' => $user, 'token' => $token], 200);
        
    }

    public function loginRedesocialGoogle(Request $request){

        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response(["message" => 'Dados inválidos'], 400);
        }

        $token = $request->input('token');

        try{
            $socialUser = Socialite::driver('google')->userFromToken($token);
        }catch(Exception $e){
            return Response(["message" => "Token do $provider não é valido"], 400);
        }

        $fullNameArray = explode(" ", $socialUser->name);

        $user =  User::where('email', $socialUser->email)->first();

        if($user === null){

            $user = User::create(
                [
                    'email' => $socialUser->email,
                    'name' => $fullNameArray[0],
                    "surname" => $fullNameArray[1],
                ]
            );
            
            $token =  $user->generateNewToken();

            return Response(['user' => $user, 'token' => $token], 200);
        }

        $user->provider_oauth  = $request->provider_oauth;
        $user->provider_oauth_code  = $request->provider_oauth_code; 
        $user->save();

        $token =  $user->generateNewToken();

        return Response(['user' => $user, 'token' => $token], 200);
    }



    public function userByToken(Request $request)
    {   
        return User::getUserForToken();
    }



    public function newPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return Response(["message" => 'Dados inválidos'], 400);
        }

        $user = User::getUserForToken();
        
        
        $user->password = Hash::make($request->password);

        $token =  $user->createToken('user')->accessToken;

        $user->save();

        return Response([ 'token' => $token], 200);
    } 


    public function logout()
    {
        User::logout();
    }

 


    public function validateCode(Request $request)
    {
       
        $indentificador = $request->input('email');

        if( is_null($indentificador)){
            $indentificador = $request->input('cpf');
        }

        $user = User::getUserIndentification($indentificador);

        if(is_null($user)){
            return  Response(["message" => "Usuário não encontrado"], 400);
        }

        if($user->validateCode($request->input('code'))){

            $token =  $user->generateNewToken();
            return Response([ 'token' => $token], 200);
        }else{
            return Response(["message" => "Codigo  invalido"], 401);
        }
    }
    
}