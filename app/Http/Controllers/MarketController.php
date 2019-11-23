<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

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
      $input = $request->all();
      $market = new Market();
      $validate = $market->validate($input);

      if (!$validate) {
          return redirect('markets/create')
            ->withInput()
            ->withErrors($market->errors);
      } else {
          if (!array_key_exists('active',$input)){
              $input['status'] = 0;
          } else {
              $input['status'] = 1;
              unset($input['active']);
          }
          Market::create($input);
          Session::flash('status_message','Market añadido.');
          return redirect('markets');
      }

    }

}
