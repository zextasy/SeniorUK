<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\CourseGroup;
use Illuminate\Http\Request;

class CourseGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $course_groups = CourseGroup::latest('id')->get();
        return response()->json($course_groups);     
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
        //
        $course_group = new CourseGroup([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'gender' => $request->input('gender')
        ]);
        $course_group->save();

        return response()->json('Course Group created successfully!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseGroup  $course_group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course_group = CourseGroup::find($id);
        return response()->json($course_group);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseGroup  $course_group
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
     * @param  \App\Models\CourseGroup  $course_group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $course_group = CourseGroup::find($id);
        $course_group->update($request->all());

        return response()->json('Course Group data updated successfully!');                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseGroup  $course_group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $course_group = CourseGroup::find($id);
        $course_group->delete();

        return response()->json('Course Group deleted successfully!');        
    }
}
