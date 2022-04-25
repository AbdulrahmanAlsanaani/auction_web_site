<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUs extends Controller
{
  public function contact(){
      return view('contact us');
  }
}
