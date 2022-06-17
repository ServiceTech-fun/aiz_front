<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * AccountController
 */
class AccountController extends Controller
{
    private $accounts;
    private $api_server = 'http://34.168.149.138:5000/user?key=all';

    /**
     * アカウント情報を全て取得する
     */
    public function getAll()
    {
        $this->accounts = json_decode(file_get_contents($this->api_server), true);
    }

    /**
     * 特定のアカウント情報を取得する
     * @param string $email
     * @return array ['ok' => true, 'content' => array] | ['ok' => false, 'error_message' => string]
     */
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

    /**
     * ログイン画面での処理を行うための関数
     * @param Request $request
     */
    public function auth( Request $request )
    {
        if(empty($request->input('email')) && empty($request->input('password'))) {
            return view('login');
        }
        if(empty($request->input('email'))){
            return view('login', ['ok' => false, 'error_message' => 'メールアドレスを入力してください']);
        }
        if(empty($request->input('password'))) {
            return view('login', ['ok' => false, 'error_message' => 'パスワードを入力してください']);
        }

        $result = $this->get( $request->input('email') );
        if ($result['ok'] == false) {
            return view('login', ['ok' => false, 'error_message' => 'ログインに失敗しました']);
        }
        return view('account.mypage', ['account' => $result['content']]);
    }
}
