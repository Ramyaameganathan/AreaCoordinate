<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class affiliatesController extends Controller
{
    public function index()
    {
       
		$myLatitude = 53.3340285;
		$myLongitude = -6.2535495;
	   
		$jsonData = file_get_contents(storage_path() . "\affiliates.json");
	
		return view('affiliaterecord',[
			'jsonData' => $jsonData,'myLatitude'=>$myLatitude,'myLongitude' =>$myLongitude
		  ]);
    }
}
