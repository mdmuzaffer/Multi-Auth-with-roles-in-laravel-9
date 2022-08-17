<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
     public function index()
    {
        return view('admin');
    }
	
	public function index2(){
		
		echo "admin 2";
		die;
	}
}
