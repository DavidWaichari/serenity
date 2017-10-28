<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function getClientsName(Request $request)
    {
        if($request->ajax()){

            $clientrequest = $request->all();
            $client = Client::where('admno',$clientrequest)->first();
            return response()->json($client);
        }
    }
}
