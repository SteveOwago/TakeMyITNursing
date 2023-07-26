<?php

namespace App\Http\Controllers;

use App\Models\StudentResult;
use App\Http\Requests\StoreStudentResultRequest;
use App\Http\Requests\UpdateStudentResultRequest;
use App\Models\Test;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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


    public function downloadTestResult($studentResultID){
        // $testTrial = TestTrial::findOrFail($testTrialResult->trial_test_id);
        $studentResult = StudentResult::findOrFail($studentResultID);
        $test = $studentResult->test;
        $report = new \App\Services\TestService();
        $data = $report->getResult($studentResult);
        // Generate the PDF content

        $pdf = Pdf::loadView('reports.pdf.test_result', $data);
        // Generate a unique filename for the PDF
        $filename = auth()->user()->name . '-' . $test->name . '-' . now()->format('Y-m-d H:i') . '.pdf';
        return $pdf->download($filename);
    }

    public function studentTests(Request $request,$studentID){
        if ($request->ajax()) {
            $query = StudentResult::with(['test','test.subjectCategory'])->where('user_id',$studentID)->where('score');
            //User Is not Administrator
            if (!auth()->user()->hasRole('Admin')) {
                $query = StudentResult::with(['test'])->where('user_id',$studentID)->whereNotNull('score')->latest();
            }


            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('test', function ($row) {
                return $row->test->name ?? 'Not Set';
            });
            $table->editColumn('subjectCategory', function ($row) {
                return $row->test->subjectCategory->name ?? 'No Name';
            });
            $table->editColumn('score', function ($row) {
                return $row->score ?? '';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ?? '';
            });
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                //Set the values to 1 to be viewable on display
                $view = 1;
                if (auth()->user()->hasrole('Admin') || auth()->user()->can('admin_management')) {
                    $routePart = 'admin.tests';
                    $edit = 1;
                    $delete = 1;
                } else {
                    $routePart = 'admin.tests.students.result';
                    $edit = 0;
                    $delete = 0;
                }

                return view('layouts.partials.utilities.datatablesActions', compact(
                    'view',
                    'edit',
                    'delete',
                    'routePart',
                    'row'
                ));
            });

            $table->rawColumns(['id', 'test', 'subjectCategory','score', 'created_at', 'actions']);

            return $table->make(true);
        }
        return view('admin.students.tests.my_tests');
    }
    public function testResult($studentResultID){
        $report = new \App\Services\TestService();
        $studentResult = StudentResult::findOrFail($studentResultID);
        $test = $studentResult->test;
        $data = $report->getResult($studentResult, $test);
        $data[] = [
            'test_result' => $studentResult->score
        ];
        return view('admin.students.tests.test_result',compact('data'));
    }
}
