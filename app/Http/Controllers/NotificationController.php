<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function index(){
        $notifications = DB::table('notifications')->latest()->get();

        return view('notifications.index', compact('notifications'));
    }
}
