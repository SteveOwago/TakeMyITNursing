<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use Illuminate\Http\Request;
use App\Models\SubjectDomain;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Question;
use App\Models\SubjectCategory;
use App\Services\SubjectDomainService;

class TestController extends Controller
{
    public $subjectDomain;

    public function __construct(SubjectDomainService $subjectDomain){
        $this->subjectDomain = $subjectDomain;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Test::with(['subjectCategory']);
            //User Is not Administrator
            if (!auth()->user()->hasRole('Admin')) {
                $categories = SubjectCategory::select('id')->where('subject_domain_id',$this->subjectDomain->getUserSubjectDomain())->cursor();
                $query = Test::with(['subjectCategory'])->whereIn('subject_category_id',$categories);
            }


            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ?? 'Not Set';
            });
            $table->editColumn('subjectCategory', function ($row) {
                return $row->subjectCategory->name ?? 'No Name';
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
                    $routePart = 'student.tests';
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

            $table->rawColumns(['id', 'name', 'subjectCategory', 'created_at', 'actions']);

            return $table->make(true);
        }
        return view('admin.tests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjectDomains = SubjectDomain::all();

        return view('admin.tests.create', compact('subjectDomains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestRequest $request)
    {
        $test = Test::create([
            'name' => $request->name,
            'subject_category_id' => $request->subject_category_id,
            'max_number_of_questions' => $request->max_number_of_questions,
            'test_duration' => $request->test_duration,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Test (' . $test->name . ') is Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Test $test)
    {
        if ($request->ajax()) {
            $query = Question::where('test_id', $test->id);

            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('question', function ($row) {
                return $row->name ?? 'Not Set';
            });
            $table->editColumn('answer', function ($row) {
                return $row->answer ?? 'No Name';
            });
            $table->editColumn('short_answer', function ($row) {
                return $row->short_answer ?? '';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ?? '';
            });
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                //Set the values to 1 to be viewable on display
                $view = 1;
                if (auth()->user()->hasrole('Admin') || auth()->user()->can('admin_management')) {
                    $routePart = 'admin.questions';
                    $edit = 1;
                    $delete = 1;
                } else {
                    $routePart = 'student.questions';
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

            $table->rawColumns(['id', 'question', 'answer', 'short_answer', 'created_at', 'actions']);

            return $table->make(true);
        }
        return view('admin.tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $subjectDomains = SubjectDomain::all();
        return view('admin.tests.edit', compact('test', 'subjectDomains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestRequest  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        $test->update([
            'name' => $request->name,
            'subject_category_id' => $request->subject_category_id,
            'max_number_of_questions' => $request->max_number_of_questions,
            'test_duration' => $request->test_duration,
            'description' => $request->description,
        ]);
        return back()->with('success', 'Test (' . $test->name . ') is Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }

    public function takeExam(Test $test)
    {
        return view('admin.tests.take-test', compact('test'));
    }

    public function chooseTest(Request $request)
    {
        if ($request->ajax()) {
            $query = Test::with(['subjectCategory']);

            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ?? 'Not Set';
            });
            $table->editColumn('subjectCategory', function ($row) {
                return $row->subjectCategory->name ?? 'No Name';
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
                    $routePart = 'student.tests';
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

            $table->rawColumns(['id', 'name', 'subjectCategory', 'created_at', 'actions']);

            return $table->make(true);
        }
        return view('students.tests.choose-test');
    }
}
