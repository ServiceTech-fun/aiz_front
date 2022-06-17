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

    public function get( string $account_id ): array
    {
        $this->getAll();
        foreach( $this->accounts as $account ) {
            if( $account['_id'] == $account_id ) {
                return ['ok' => true, 'content' => $account];
            }
        }
        return ['ok' => false, 'error_message' => 'account id is not found'];
    }

    public function auth( Request $request )
    {
        $result = $this->get( $request->input('user_id') );
        if ($result['ok'] == false) {
            return view('login', ['status' => 404]);
        }
        return view('mypage', ['account' => $result['content']]);
    }
}
