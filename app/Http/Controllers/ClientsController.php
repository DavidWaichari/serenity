<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.home',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addClient = new Client();
        $addClient->admno = $request->admno;
        $addClient->lastname = $request->lastname;
        $addClient->firstname = $request->firstname;
        $addClient->middlename = $request->middlename;
        $addClient->medicalhistory = $request->medicalhistory;
        $addClient->drugofchoice = $request->drugofchoice;
        $addClient->residence = $request->residence;
        $addClient->contact = $request->contact;

        $addClient->save();

        return redirect(route('clients.index'))->with('message','Client Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientsDetails = Client::find($id);
        return view('clients.show',compact('clientsDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editClient = Client::find($id);
        return view('clients.edit',compact('editClient'));
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
        $updateClient = Client::find($id);
        $updateClient->admno = $request->admno;
        $updateClient->lastname = $request->lastname;
        $updateClient->firstname = $request->firstname;
        $updateClient->middlename = $request->middlename;
        $updateClient->medicalhistory = $request->medicalhistory;
        $updateClient->drugofchoice = $request->drugofchoice;
        $updateClient->residence = $request->residence;
        $updateClient->contact = $request->contact;

        $updateClient->save();

        return redirect(route('clients.index'))->with('message','Client details updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteClient = Client::find($id);
        $deleteClient->delete();
        return redirect(route('clients.index'))->with('message','Client deleted successfully');
    }
}
