<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MarketController extends Controller
{
    public function index( $status='all' ){
        if( $status=='all' ){
            $markets = Market::getAllMarkets();
        }elseif( $status=='active' ){
            $markets = Market::getActiveMarkets();
        }
        return view( 'markets.index', ['markets'=>$markets] );
    }

    public function create(){
        return view( 'markets.create');
    }

    public function store(Request $request){
      dd($request);
    }

}
