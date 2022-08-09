<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ContactForm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Mail;
// use Stripe;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $model = new ContactForm;
        // dd($request);
        try {
            $model->name = $request->name;
            $model->phone = $request->phone;
            $model->email = $request->email;
            $model->service = $request->service;
            $model->message = $request->message;
            $model->save();
            $report = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'service' =>$request->service,
                'message' => $request->message
            ];
            // echo '<pre>';print_r($report);exit;
            Mail::to('mohamedshayid8844@gmail.com')->send(new ContactFormMail($report));
            Mail::to('venkat.cairns004@gmail.com')->send(new ContactFormMail($report));
            return back()->with('success','Contact Form submitted successfully.');
        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }

    public function buyproduct(Products $products)
    {
        return view('buyproduct', ['products' => $products]);
    }

}
