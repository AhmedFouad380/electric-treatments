<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class design extends Controller
{
    public function inbox () {
        return view('Admin.design.inbox');
    }

    public function inbox_details () {
        return view('Admin.design.inbox_details');
    }

    public function outbox () {
        return view('Admin.design.outbox');
    }

    public function inbox_send () {
        return view('Admin.design.inbox_send');
    }

    public function outbox_send () {
        return view('Admin.design.outbox_send');
    }

    public function report () {
        return view('Admin.design.report');
    }

    public function archive () {
        return view('Admin.design.archive');
    }
}
