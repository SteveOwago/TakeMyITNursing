<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use App\Http\Requests\StoreStudentResultRequest;
use App\Http\Requests\UpdateStudentResultRequest;
use App\Models\Test;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class StudentResultController extends Controller
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
     * @param  \App\Http\Requests\StoreStudentResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentResult  $studentResult
     * @return \Illuminate\Http\Response
     */
    public function show(StudentResult $studentResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentResult  $studentResult
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentResult $studentResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentResultRequest  $request
     * @param  \App\Models\StudentResult  $studentResult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentResultRequest $request, StudentResult $studentResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentResult  $studentResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentResult $studentResult)
    {
        //
    }

    public function getStudentResults($studentResultID)
    {
        $report = new \App\Services\TestService();
        $studentResult = StudentResult::findOrFail($studentResultID);
        $test = $studentResult->test;
        $data = $report->getResult($studentResult, $test);
        $pdf = Pdf::loadView('reports.pdf.test_result', $data);
        return $pdf->download($studentResult->user->name.'-'.$test->name.'-'.Carbon::now()->format('Y-m-d H:i').'.pdf');
    }
}
