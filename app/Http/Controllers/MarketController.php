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

    public function show($id){
        $market = Market::find($id);
        return view('markets.show')
            ->withTitle('Detalle del Market')
            ->with('market', $market);
    }

    public function edit($id){
        $market = Market::findOrFail($id);
        return view('markets.edit')
            ->withTitle('Editar Market')
            ->with('market', $market);
    }

    public function update(Request $request, $id){
        $market = Market::find($id);
        $input = $request->all();
        if ($market->validate($input)) {
            $market->name = $request->name;
            $market->description = $request->description;
            $market->status = (bool)$request->status;
            $market->save();

            Session::flash('status_message','Market editado.');
            return redirect('markets');
        }
        return back()->withInput($input)->withErrors($market->errors);
    }

    public function destroy($id){
        try {
            $market = Market::findOrFail($id);
            $market->delete();
            $status_message = 'Market eliminado';
        } catch (ModelNotFoundException $e) {
            $status_message = 'No hay market con ese id.';
        }
        Session::flash('status_message', $status_message);
        return redirect('markets');
    }
}
