<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbandoLandController extends Controller
{
    private $abando_lands;

    public function getAll()
    {
        $api_server = 'http://34.168.149.138:5000/';
        $this->abando_lands = json_decode(file_get_contents($api_server), true);
    }

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

    public function viewByLandId( string $land_id )
    {
        $land = $this->get($land_id);
        if( $land['ok'] == false ) {
            return view('404');
        }
        return view('detail', ['abando_land' => $land['content']]);
    }
}