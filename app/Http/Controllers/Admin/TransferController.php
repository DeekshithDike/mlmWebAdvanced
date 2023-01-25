<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferHistory;
use App\Models\User;

class TransferController extends Controller
{
    public function transferReport() {
        $data = TransferHistory::viewTransferHistory([]);
        return view('admin.transfer-report')->with(['data' => $data]);
    }
}
