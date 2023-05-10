<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Question::with(['subjectCategory']);

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
                $edit = 1;
                $delete = 0;
                $routePart = 'admin.questions';

                return view('layouts.partials.utilities.datatablesActions', compact(
                    'view',
                    'edit',
                    'delete',
                    'routePart',
                    'row'
                ));
            });

            $table->rawColumns(['id', 'name', 'subjectCategory', 'created_at','actions']);

            return $table->make(true);
        }
        return view('admin.questions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjectDomains = Test::all();

        return view('admin.questions.create', compact('subjectDomains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorequestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorequestionRequest $request)
    {
        $question = Question::create([
            'name' => $request->name,
            'subject_category_id' => $request->subject_category_id,
            'max_number_of_questions' => $request->max_number_of_questions,
            'question_duration' => $request->question_duration,
            'description' => $request->description,
        ]);

        return back()->with('success','question ('.$question->name.') is Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $subjectDomains = Test::all();
        return view('admin.questions.edit',compact('question','subjectDomains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequestionRequest  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatequestionRequest $request, Question $question)
    {
        $question->update([
            'name' => $request->name,
            'subject_category_id' => $request->subject_category_id,
            'max_number_of_questions' => $request->max_number_of_questions,
            'question_duration' => $request->question_duration,
            'description' => $request->description,
        ]);
        return back()->with('success','question ('.$question->name.') is Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
