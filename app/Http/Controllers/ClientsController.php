<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('clients.index'))
        {
            $clients = Client::all();
            return view('clients.home',compact('clients'));
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
        if (Auth::user()->can('clients.create'))
        {
            return view('clients.create');
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
        if (Auth::user()->can('clients.show'))
        {
            $clientsDetails = Client::find($id);
            return view('clients.show',compact('clientsDetails'));
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
        if (Auth::user()->can('clients.edit'))
        {
            $editClient = Client::find($id);
            return view('clients.edit',compact('editClient'));
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
        if (Auth::user()->can('client.delete'))
        {
            $deleteClient = Client::find($id);
            $deleteClient->delete();
            return redirect(route('clients.index'))->with('message','Client deleted successfully');
        }
        abort('401');
    }
}
