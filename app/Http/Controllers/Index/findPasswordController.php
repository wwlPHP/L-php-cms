<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class findPasswordController extends Controller
{
  public function view()
  {
    return view('index.woshipm.templates.find_password');
  }
}
