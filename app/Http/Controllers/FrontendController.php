<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'name.required' => 'Nama Wajib Diisi!',
            'phone.required' => 'No Handphone Wajib Diisi',
            'ticket.required' => 'Masukan Jumlah Ticket'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'ticket' => 'required'
        ], $message);
        if ($validator->fails()) {
            return redirect()->route('frontend.index')->withErrors($validator)->withInput();
        }

        $customer = Customer::create($request->all());
        for ($i=1; $i <= $customer->ticket ; $i++) {
            $ticket = new Ticket();
            $ticket->customer_id = $customer->id;
            $ticket->code = Str::random(5);
            $ticket->checkin = 0;
            $ticket->save();
        }
        return redirect()->route('frontend.invoice', $customer->id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function invoice($id)
    {
        $customer = Customer::find($id);
        return view('frontend.invoice', compact('customer'));
    }
}
