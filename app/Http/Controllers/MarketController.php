<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MarketController extends Controller
{
    public function index(){
        $markets = Market::all();
        $output = $markets[0]->toArray();
        $output['updated_at'] = $markets[0]->updated_at->diffForHumans();
        dd($output);
    }

}
