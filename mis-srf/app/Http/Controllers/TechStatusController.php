<?php

namespace App\Http\Controllers;

use App\Models\TechnicianStatus;
use App\Traits\SystemMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechStatusController extends Controller
{
    use SystemMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TechnicianStatus::orderBy('name')->get());
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:technician_statuses|string',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator, '404');
        }

        TechnicianStatus::create($validator->validated());
        return response()->json($this->store_success());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicianStatus $status)
    {
        return response()->json(compact('technicianStatus'));
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
    public function update(Request $request, TechnicianStatus $status)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:technician_statuses|string',
            ]);
     
            if ($validator->fails()) {
                return response()->json($validator, '404');
            }

            $status->update($validator->validated());
            return response()->json($this->store_success());
        }
        catch (Exception $exception)
        {
            logger($exception);
            return response()->json($this->exception());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechnicianStatus $status)
    {
        try
        {
            $status->delete();
            return response()->json($this->delete_success());
        }
        catch (Exception $exception)
        {
            logger($exception);
            return response()->json($this->exception());
        }
    }
}
