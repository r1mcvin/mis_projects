<?php

namespace App\Http\Controllers;

use App\Http\Requests\TechnicianPostRequest;
use App\Http\Requests\TechnicianPutRequest;
use App\Models\Technician;
use App\Services\TechnicianServices;
use App\Traits\SystemMessage;
use Exception;

class TechnicianController extends Controller
{
    use SystemMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicians = Technician::orderBy('given_name')->get();
        return response()->json($technicians);
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
    public function store(TechnicianPostRequest $request, TechnicianServices $services)
    {
        $init = $services->create($request->validated());
        
        if (@$init['error'])
        {
            return response()->json($init['error'], 404);
        }

        return response()->json($init['success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Technician $technician)
    {
        return response()->json($technician);
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
    public function update(TechnicianPutRequest $request, Technician $technician)
    {
        try
        {
            $technician->update($request->validated());
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
    public function destroy(Technician $technician)
    {
        try
        {
            $technician->delete();
            return response()->json($this->delete_success());
        }
        catch (Exception $exception)
        {
            logger($exception);
            return response()->json($this->exception());
        }
    }
}
