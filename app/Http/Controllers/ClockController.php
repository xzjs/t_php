<?php

namespace App\Http\Controllers;

use App\Clock;
use Illuminate\Http\Request;

class ClockController extends Controller
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
        try{
            $clock=new Clock();
            $clock->repeat_type=$request->repeat_type;
            $clock->duration=$request->duration;
            $clock->delete=$request->delete;
            $clock->remark=$request->remark;
            $clock->time=$request->time;
            $clock->device_id=$request->device_id;
            $clock->save();
            $clock->rings()->attach($request->rings);
            $clock->save();
            $result['status']=true;
            return response()->json($result);
        }catch (\Exception $exception){
            $result['status']=false;
            $result['message']=$exception->getMessage();
            return response()->json($result);
        }

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
}
