<?php

namespace App\Http\Controllers;

use App\Models\SubjectCategory;
use App\Http\Requests\StoreSubjectCategoryRequest;
use App\Http\Requests\UpdateSubjectCategoryRequest;

class SubjectCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreSubjectCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectCategory $subjectCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectCategory $subjectCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectCategoryRequest  $request
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectCategoryRequest $request, SubjectCategory $subjectCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectCategory  $subjectCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectCategory $subjectCategory)
    {
        //
    }
}
