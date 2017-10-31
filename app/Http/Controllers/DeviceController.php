<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DeviceController extends Controller
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
        try {
            $device = new Device();
            $device->mac = $request->mac;
            $device->type = $request->type;
            //TODO 二维码的网址需要修改
            QrCode::format('png')
                ->size(200)
                ->merge('/public/qrcodes/logo.jpg', .15)
                ->generate("http://www.baidu.com?mac=$request->mac", public_path("qrcodes/$request->mac.png"));
            $device->qr = $request->mac . '.png';
            $device->save();
            $result['status'] = true;
            $result['data']=$device->id;
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
        try {
            $device = Device::findOrFail($id);
            $device->user_id = $request->user_id;
            $result['status'] = true;
            return response()->json($result);
        } catch (\Exception $exception) {
            $result['status'] = false;
            $result['message'] = $exception->getMessage();
            return response()->json($result);
        }
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
