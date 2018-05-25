<?php

namespace App\Http\Controllers;

use App\Clock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ClockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['status'] = true;
        try {
            $device_id = Input::get('device_id');
            if (isset($device_id)) {
                $result = Clock::where('device_id', $device_id)->get();
            } else {
                $result = [];
            }
        } catch (\Exception $exception) {
            $result = array(
                "status" => false,
                "message" => $exception->getMessage()
            );
        } finally {
            return response()->json($result);
        }
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $clock = new Clock();
            $clock->repeat_type = $request->repeat_type;
            $clock->duration = $request->duration;
            $clock->delete = $request->delete;
            $clock->remark = $request->remark;
            $clock->time = $request->time;
            $clock->device_id = $request->device_id;
            $clock->save();
            $clock->rings()->attach($request->rings);
            $clock->save();
            $result['status'] = true;
            return response()->json($result);
        } catch (\Exception $exception) {
            $result['status'] = false;
            $result['message'] = $exception->getMessage();
            return response()->json($result);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
