<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        //retira caracteres especiais
        $semcarac = preg_replace("/[^a-zA-Z0-9\s]/", "", $data['email']);
        
        DB::statement("CREATE TABLE IF NOT EXISTS $semcarac(
                        id_chat int(15) primary key auto_increment,
                        enome varchar(40),
                        idcompador VARCHAR(15) NOT NULL,
                        remetente varchar(40) NOT NULL,
                        destinatario varchar(40) NOT NULL,
                        mensagem varchar(300) NOT NULL,
                        idproduto VARCHAR(15) NOT NULL,
                        vendedor VARCHAR(40) NOT NULL,
                        fotov VARCHAR(300) NOT NULL,
                        hora timestamp
                      )");

        $idcity = explode(',', $data['cid']);

        return User::create([
            'name' => $data['name'],
            'lastTib' => $data['lastname'],
            'id_cidade' => $idcity[0],
            'cidade' => $data['cidade'],
            'bairro' => $data['bairro'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

