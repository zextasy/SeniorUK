<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semesters = Semester::withCount('course_groups')->latest('id')->get();
        return response()->json($semesters);     
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
        $semester = new Semester([
            'year' => $request->input('year'),
            'season' => $request->input('season'),
        ]);
        $semester->save();

        return response()->json('Semester created successfully!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $semester = Semester::with('course_groups.course','course_groups.lecturer')
            ->with(['course_groups' => function($query){
                $query->withCount('students');
            }])->find($id);
        return response()->json($semester);        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
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
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $semester = Semester::find($id);
        $semester->update($request->all());

        return response()->json('Semester data updated successfully!');                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $semester = Semester::find($id);
        $semester->delete();

        return response()->json('Semester deleted successfully!');        
    }
}
