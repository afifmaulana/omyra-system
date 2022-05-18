<?php

namespace App\Http\Controllers\Frontend\Notification;

use App\Http\Controllers\Controller;
use App\Models\LogActivity;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $log = LogActivity::orderBy('id', 'DESC')->paginate('10');
        return view('pages.frontend.notification.index', [
            'log' => $log,
        ]);
    }
}
