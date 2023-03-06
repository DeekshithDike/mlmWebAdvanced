<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectIncome;
use Auth;

class CommonController extends Controller
{
    public function index() {
        if (Auth::user()->user_role == "USER") {
            return redirect()->route('customerDashboard');
        }
        return redirect()->route('adminDashboard');
    }

    // public function testcron() {
    //     DirectIncome::addDirectIncome([
    //         'users_id' => 1,
    //         'referred' => 'KM0000000',
    //         'amount' => 500,
    //         'status' => "PAID",
    //         'created_at' => date('Y-m-d H:i:s'),
    //         'updated_at' => date('Y-m-d H:i:s')
    //     ]);
    //     return json_encode([
    //         "status" => "success"
    //     ]);
    // }

    public function sendDailyBinary() {
        $sendPayload = [
            'todayDate' => date('Y-m-d'),
            'todayDateTime' => date('Y-m-d H:i:s'),
            'nodePaymentSecret' => "7rujRuSI406CuKrbF9b9j2No3odTtIJ-udH8pPB8AM-Kd54Nzu"
        ];
        
        try {
            // call API to add binary income to users
            $client = new \GuzzleHttp\Client();
            $url = config('services.nodeapi.endpoint')."/api/v1/user/daily/payment/binary";
            $promise = $client->postAsync($url, ['json' => $sendPayload], ['Content-Type' => 'application/json']);
            $promise->wait();

            return json_encode([
                "status" => "success",
                "message" => "API request sent successful to node server for BINARY income."
            ]);
        } catch (\Throwable $th) {
            return json_encode(['status'=>'failed','message'=>$th->getMessage()]);
        }
    }

    public function sendDailyRoi() {
        $sendPayload = [
            'todayDate' => date('Y-m-d'),
            'paymentDate' => date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d')))),
            'todayDateTime' => date('Y-m-d H:i:s'),
            'nodePaymentSecret' => "7rujRuSI406CuKrbF9b9j2No3odTtIJ-udH8pPB8AM-Kd54Nzu",
            'weekday' => date("N", strtotime(date('Y-m-d')))
        ];
        
        try {
            // call API to add binary income to users
            $client = new \GuzzleHttp\Client();
            $url = config('services.nodeapi.endpoint')."/api/v1/user/daily/payment/roi";
            $promise = $client->postAsync($url, ['json' => $sendPayload], ['Content-Type' => 'application/json']);
            $promise->wait();

            return json_encode([
                "status" => "success",
                "message" => "API request sent successful to node server for ROI income."
            ]);
        } catch (\Throwable $th) {
            return json_encode(['status'=>'failed','message'=>$th->getMessage()]);
        }
    }
}
