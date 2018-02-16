<?php

namespace App\Http\Controllers;

use App\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $readings=Reading::all();
        return view('reading.index',compact('readings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reading.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reading::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'content'=>$request->reading,
        ]);
        flash('Se guardo la lectura corretamente!')->success()->important();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function show(Lectura $lectura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function edit(Lectura $lectura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lectura $lectura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lectura  $lectura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lectura $lectura)
    {
        //
    }
}
