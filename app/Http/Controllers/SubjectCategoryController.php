<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\SubjectCategory;

class SubjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubjectCategory::all();

        return response()->json([
            'message' => 'Success',
            'status' => '200',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubjectCategory::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'success',
            'status' => '200'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {
        $subject = SubjectCategory::where('name', $subject)->first();
        $data = Section::where('subject_id', $subject->id)->get();
        return response()->json([
            'data' => $data,
            'status' => '200'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {

        $data = SubjectCategory::where('name', $subject)->update(['name' => $request->name]);
        return response()->json([
            'message' => 'Success',
            'status' => '200',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject)
    {
        $data = SubjectCategory::where('name', $subject)->delete();
        return response()->json([
            'message' => 'Delete Success',
            'status' => '200',
        ], 200);
    }
}