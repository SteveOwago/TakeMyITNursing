<?php

namespace App\Http\Controllers;

use App\Models\TestTrial;
use App\Http\Requests\StoreTestTrialRequest;
use App\Http\Requests\UpdateTestTrialRequest;
use App\Models\SubjectCategory;
use App\Models\SubjectDomain;
use App\Models\Test;
use DB;
use Illuminate\Http\Request;

class TestTrialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjectDomains = SubjectDomain::all();
        return view('tests.trial.index', compact('subjectDomains'));
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
     * @param  \App\Http\Requests\StoreTestTrialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        //Create trial Test
        $trialTest = TestTrial::create([
            'test_id' => $request->test_id,
            'visitor_email' => $request->email??null,
            'visitor_ip_address' => request()->ip(),
        ]);
        $test = Test::whereid($trialTest->test_id)->get();

        //Redirect to the Test Page With Questions and Answers

        return view('tests.trial.show',compact('trialTest','test'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestTrial  $testTrial
     * @return \Illuminate\Http\Response
     */
    public function show(TestTrial $testTrial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestTrial  $testTrial
     * @return \Illuminate\Http\Response
     */
    public function edit(TestTrial $testTrial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestTrialRequest  $request
     * @param  \App\Models\TestTrial  $testTrial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestTrialRequest $request, TestTrial $testTrial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestTrial  $testTrial
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestTrial $testTrial)
    {
        //
    }


    public function fetchTests(Request $request){
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $subjectCategoryIDs = SubjectCategory::select('id')->where('subject_domain_id',$value)->get();
        $data = DB::table('tests')
                    ->whereIn('subject_category_id', $subjectCategoryIDs)
                    ->get();
        $output = '<option value="" selected disabled>Select
        Test</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }
}
