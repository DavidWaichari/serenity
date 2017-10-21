<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('sponsors.home',compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createSponsor = new Sponsor();
        $createSponsor->lastname = $request->lastname;
        $createSponsor->firstname = $request->firstname;
        $createSponsor->middlename = $request->middlename;
        $createSponsor->idnumber = $request->idnumber;
        $createSponsor->contact = $request->contact;
        $createSponsor->residence = $request->residence;
        $createSponsor->save();

        return redirect(route('sponsors.index'))->with('message','Sponsor added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showSponsor = Sponsor::find($id);
        return view('sponsors.show',compact('showSponsor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editSponsor = Sponsor::find($id);
        return view('sponsors.edit',compact('editSponsor'));
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
        $updateSponsor = Sponsor::find($id);
        $updateSponsor->lastname = $request->lastname;
        $updateSponsor->firstname = $request->firstname;
        $updateSponsor->middlename = $request->middlename;
        $updateSponsor->idnumber = $request->idnumber;
        $updateSponsor->contact = $request->contact;
        $updateSponsor->residence = $request->residence;
        $updateSponsor->save();

        return redirect(route('sponsors.index'))->with('message','Sponsor details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteSponsor = Sponsor::find($id);
        $deleteSponsor->delete();

        return redirect(route('sponsors.index'))->with('message','Sponsor deleted successfully');
    }
}
