<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoinbaseCharges;

class CoinbaseController extends Controller
{
    public function listCoinbaseReport() {
        $data = CoinbaseCharges::viewCoinbaseCharges();
        return view('admin.coinbase-report')->with(['data' => $data]);
    }
}
