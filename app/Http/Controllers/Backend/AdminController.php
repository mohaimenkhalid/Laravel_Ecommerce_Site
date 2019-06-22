<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth:admin');
    }
}
