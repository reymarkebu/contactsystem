<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new Contact();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = Auth::user()->contacts()->latest()->paginate(5);

        // dd(count($data['items']));
        return view('contacts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request = $request->all();
        
        $data['name'] = $request['name'];
        $data['company'] = $request['company'];
        $data['phone'] = $request['phone'];
        $data['email'] = $request['email'];

        $result = Auth::user()->contacts()->create($data);
        
        return redirect('contacts/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->findOrFail($id);

        return view('contacts.edit', compact('data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cur_data = $this->model->findOrFail($id);
        $request = $request->all();
        
        $data['name'] = $request['name'];
        $data['company'] = $request['company'];
        $data['phone'] = $request['phone'];
        $data['email'] = $request['email'];

        $cur_data->fill($data)->save();

        return redirect('contacts/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $contact = $this->model->findOrFail($id);
        $contact->delete();


        return redirect('contacts/');
    }

  
}
