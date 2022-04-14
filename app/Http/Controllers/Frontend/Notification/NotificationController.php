<?php

namespace App\Http\Controllers\Frontend\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('pages.frontend.notification.index');
    }
}
