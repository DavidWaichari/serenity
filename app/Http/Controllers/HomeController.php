<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Client;
use App\Sponsor;
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
    public function getSponsorsName(Request $request)
    {
        if($request->ajax()){

            $sponsorrequest = $request->all();
            $sponsor = Sponsor::where('idnumber',$sponsorrequest)->first();
            return response()->json($sponsor);
        }
    }
    //function for pupulating the financial table
    public function getAdmissionDetails(Request $request)
    {
        if($request->ajax()){

            $admissiondetailsfinance = $request->all();
            $result = Admission::where('clientsadmn',$admissiondetailsfinance)->first();
            return response()->json($result);
        }
    }

    public function getRehabBalance()
    {
        $totalAmount = 250000;
        $amountPaid = 70000;
        $balance = $totalAmount - $amountPaid;

        return dd($balance);

    }

}
