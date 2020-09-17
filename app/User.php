<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cpf','code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     * 
     */
    public static function createNewUser(array $dataUser){

        $dataUser['password'] = Hash::make($dataUser['password']); 

        return  User::create($dataUser);

    }

    /**
     *  verifica se existe algum usuario da lista cadastrado no banco de dados
     * 
     * @param array $list lista de emails e CPFs para consular
     * @return bool
     */
    public static function checkListUserInDatabase( array $list ){

       $user  = User::whereIn('email', $list )->get();

       if($user->isNotEmpty()){
            return true;
       }

       $user  = User::whereIn('cpf', $list )->get();

       if($user->isNotEmpty()){
            return true;
       }

       return false;
    }

    public function generateNewToken()
    {
        $this->tokens()->delete();
        return $this->createToken('user')->accessToken;
    }

    public static function getUserIndentification($indentification){

        $user  = User::where('email', $indentification )->first();

        if(! is_null($user)){
             return $user;
        }
 
        $user  = User::where('cpf', $indentification )->first();
 
        if(! is_null($user)){
            return $user;
        }

        return null;
    }

    public function validatePassword($inputOfPassword)
    {
        if (Hash::check($inputOfPassword, $this->password)) {
            return true;
        } else {
            return false;
        }
    }


    public function getCode()
    {
        $this->code = rand(1000, 9999);

        $this->save();

        return $this->code;
    }

    public static function getUserForToken()
    {
        try {
            return Auth::user();
        } catch (\Exception $e) {
            return null;
        }
    }
}
