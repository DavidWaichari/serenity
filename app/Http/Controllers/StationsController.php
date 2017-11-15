<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->can('stations.index'))
        {
            $stations = Station::all();
            return view('stations.home',compact('stations'));
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
        if (Auth::user()->can('stations.create'))
        {
           return view('stations.create');
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
        $addStation = new Station();
        $addStation->name = $request->name;
        $addStation->save();

        return redirect(route('stations.index'))->with('message','Station Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->can('stations.show'))
        {
            $stationDetails = Station::find($id);
            return view('stations.show',compact('stationDetails'));
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
        if (Auth::user()->can('stations.edit'))
        {
            $editStation = Station::find($id);
            return view('stations.edit',compact('editStation'));
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
        $updateStation = Station::find($id);
        $updateStation->name = $request->name;
        $updateStation->save();

        return redirect(route('stations.index'))->with('message','Station details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('stations.delete'))
        {
            $deleteStation = Station::find($id);
            $deleteStation->delete();

            return redirect(route('stations.index'))->with('message','Station Deleted Successfully');
        }
        abort('401');
    }
}
