<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Tib\User
     */
    protected function create(array $data)
    {

       /* //retira caracteres especiais
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
        ]);*/
    }
}
