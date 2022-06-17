<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * AbandoLandController
 */
class AbandoLandController extends Controller
{
    private $abando_lands;
    private $api_server = 'http://34.168.149.138:5000/';

    /**
     * 土地情報を全て取得する
     */
    public function getAll()
    {
        $this->abando_lands = json_decode(file_get_contents($this->api_server), true);
    }

    /**
     * 特定の土地情報を取得する
     * @param string $land_id
     * @return array ['ok' => true, 'content' => array] | ['ok' => false, 'error_message' => string]
     */
    public function get( string $land_id ): array
    {
        $this->getAll();
        foreach( $this->abando_lands as $land ) {
            if( $land['_id'] == $land_id ) {
                return ['ok' => true, 'content' => $land];
            }
        }
        return ['ok' => false, 'error_message' => 'land id is not found'];
    }

    /**
     * 特定の土地IDの指定があった場合に表示するためのViewを返す
     * @param string $land_id
     */
    public function viewByLandId( string $land_id )
    {
        $land = $this->get($land_id);
        if( $land['ok'] == false ) {
            return view('404');
        }
        return view('detail', ['abando_land' => $land['content']]);
    }
}