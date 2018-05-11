<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if ($id == 0) {
                $result = array(
                    "status" => true,
                    "data" => array(
                        "today" => array(
                            "city" => "101010100",
                            "update_time" => "11:30更新 ",
                            "pollute" => "74良",
                            "tempmin" => "6",
                            "weather" => "晴转阴",
                            "time" => 1509520805.983224,
                            "wind" => "南风 1级",
                            "tempmax" => "17"
                        )
                    )
                );
                return response()->json($result);
            }
            $context = new \ZMQContext();
            $requester = new \ZMQSocket($context, \ZMQ::SOCKET_REQ);
            $requester->connect("tcp://127.0.0.1:5556");
            $message['city'] = $id;
            $message['info'] = ['today'];
            $requester->send(json_encode($message));
            $reply = $requester->recv();
            $result['status'] = true;
            $result['data'] = json_decode($reply);
            return response()->json($result);
        } catch (\Exception $exception) {
            $result['status'] = false;
            $result['message'] = $exception->getMessage();
            return response()->json($result);
        }
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
