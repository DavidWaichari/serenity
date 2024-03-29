<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Client;
use App\Sponsor;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = Admission::all();
        return view('admissions.home',compact('admissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('admissions.create'))
        {
            $idnumbers = Sponsor::all();
            $admissionnumbers = Client::all();
            $stations = Station::all();
            return view('admissions.create',compact(['stations','admissionnumbers','idnumbers']));
        }
        abort('401');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'clientsadmn'=>'required|max:50|unique:admissions',
        ]);
        $addAddmission = new Admission();
        $addAddmission->clientsadmn = $request->clientsadmn;
        $addAddmission->clientsname = $request->clientsname;
        $addAddmission->sponsorsidnumber = $request->sponsorsidnumber;
        $addAddmission->sponsorsname = $request->sponsorsname;
        $addAddmission->station = $request->station;
        $addAddmission->expectedexitdate = $request->expectedexitdate;
        $addAddmission->exitdate = $request->exitdate;
        $addAddmission->exitcomments = $request->exitcomments;
        $addAddmission->save();

        return redirect(route('admissions.index'))->with('message','Client admitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->can('admissions.show'))
        {
            $showAdmission = Admission::find($id);
            return view('admissions.show',compact('showAdmission'));
        }
        abort('401');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('admissions.edit'))
        {
            $stations = Station::all();
            $idnumbers = Sponsor::all();
            $admissionnumbers = Client::all();
            $editAdmission = Admission::find($id);
            return view('admissions.edit',compact(['editAdmission','admissionnumbers','idnumbers','stations']));
        }
        abort('401');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateAdmission = Admission::find($id);
        $updateAdmission->clientsadmn = $request->clientsadmn;
        $updateAdmission->clientsname = $request->clientsname;
        $updateAdmission->sponsorsidnumber = $request->sponsorsidnumber;
        $updateAdmission->sponsorsname = $request->sponsorsname;
        $updateAdmission->station = $request->station;
        $updateAdmission->expectedexitdate = $request->expectedexitdate;
        $updateAdmission->exitdate = $request->exitdate;
        $updateAdmission->exitcomments = $request->exitcomments;
        $updateAdmission->save();

        return redirect(route('admissions.index'))->with('message','Admission details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('admissions.delete'))
        {
            $deleteAdmission = Admission::find($id);
            $deleteAdmission->delete();

            return redirect(route('admissions.index'))->with('message','Admission record deleted successfully');
        }
        abort('401');
    }

}
