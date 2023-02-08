<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Rules\IsCompositeUnique;
use App\Traits\SystemMessage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    use SystemMessage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Section::orderBy('name')->get());
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
            'name' => 'required|unique:sections|string',
            'department_id' => 'required|int',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator, 404);
        }

        try
        {
            Section::create($validator->validated());
            return response()->json($request->input('name').' ' . $this->wname_store_success());
        }
        catch (Exception $exception)
        {
            logger($exception);
            return response()->json($this->exception());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return response()->json(compact('section'));
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
    public function update(Request $request,Section $section)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string', new IsCompositeUnique('sections', ['name' => $section->name, $section->department_id], $section->id),
            'department_id' => 'required|int',
        ]);
 
        if ($validator->fails()) {
            return response()->json($validator, 404);
        }

        try
        {
            $section->update($validator->validated());
            return response()->json($section->name.' '. $this->wname_store_success());
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
    public function destroy(Section $section)
    {
        try
        {
            $section->delete();
            return response()->json($this->delete_success());
        }
        catch (Exception $exception)
        {
            logger($exception);
            return response()->json($this->exception());
        }
    }
}
