<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('sponsors.index'))
        {
            $sponsors = Sponsor::all();
            return view('sponsors.home',compact('sponsors'));
        }
        abort('401');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('sponsors.create'))
        {
            return view('sponsors.create');
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
            'idnumber'=>'required|max:10|unique:sponsors',
        ]);
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
       if (Auth::user()->can('sponsors.show'))
       {
           $showSponsor = Sponsor::find($id);
           return view('sponsors.show',compact('showSponsor'));
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
        if (Auth::user()->can('sponsors.edit'))
        {
            $editSponsor = Sponsor::find($id);
            return view('sponsors.edit',compact('editSponsor'));
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
        if (Auth::user()->can('sponsors.delete'))
        {
            $deleteSponsor = Sponsor::find($id);
            $deleteSponsor->delete();

            return redirect(route('sponsors.index'))->with('message','Sponsor deleted successfully');
        }
        abort('401');
    }
}
