<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\CourseGroup;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Semester;

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
        $course_groups = CourseGroup::with('course', 'lecturer', 'semester')->withCount('students')->latest('id')->paginate(25); //
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
            'course_id' => $request->input('course_id'),
            'lecturer_id' => $request->input('lecturer_id'),
            'semester_id' => $request->input('semester_id')
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
        $course_group = CourseGroup::with('course', 'lecturer', 'semester','students')->withCount('students')->find($id);
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
