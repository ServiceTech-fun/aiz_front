<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAll()
    {
        $api_server = 'http://34.168.149.138:5000/user?key=all';
        $this->accounts = json_decode(file_get_contents($api_server), true);
    }

    public function get( string $email ): array
    {
        $this->getAll();
        foreach( $this->accounts as $account ) {
            if( $account['email'] == $email ) {
                return ['ok' => true, 'content' => $account];
            }
        }
        return ['ok' => false, 'error_message' => 'account id is not found'];
    }

    public function auth( Request $request )
    {
        if(empty($request->input('email')) || empty($request->input('password'))){
            return view('login');
        }

        $result = $this->get( $request->input('email') );
        if ($result['ok'] == false) {
            return view('login', ['status' => 404]);
        }
        return view('account.mypage', ['account' => $result['content']]);
    }
}
