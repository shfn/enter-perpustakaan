<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class RenLogController extends Controller
{
    public function index()
    {
        $today  = Carbon::now()->toDateString();
        $renlog = RentLogs::with(['user', 'book'])->get();
        return view('rentlog', ['renlog' => $renlog, 'today' => $today]);
    }
}
