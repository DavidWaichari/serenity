<?php

namespace App\Http\Controllers;

use App\Allocation;
use App\Client;
use App\Sponsor;
use Illuminate\Http\Request;

class AllocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allocations = Allocation::all();
        return view('allocations.home',compact('allocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $sponsors = Sponsor::all();
        return view('allocations.create',compact(['clients','sponsors']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addAllocation = new Allocation();
        $addAllocation->client_id = $request->client_id;
        $addAllocation->sponsor_id = $request->sponsor_id;

        $addAllocation->save();

        return redirect(route('allocations.index'))->with('message','Allocation has been made');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('allocations.edit');
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
        $addAllocation = Allocation::find($id);
        $addAllocation->client_id = $request->client_id;
        $addAllocation->sponsor_id = $request->sponsor_id;

        $addAllocation->save();

        return redirect(route('allocations.index'))->with('message','Allocation has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteAllocation = Allocation::find($id);
        $deleteAllocation->delete();

        return redirect(route('allocations.index'))->with('message','Allocation has been deleted');
    }

}
