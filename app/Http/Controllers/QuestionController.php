<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\AnswerChoice;
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
                $delete = 1;
                $routePart = 'admin.questions';

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
        return view('admin.questions.index');
    }


    // //Test Questions
    // public function indexTestQuestions(Request $request,$testID)
    // {
    //     if ($request->ajax()) {
    //         $query = Question::with(['subjectCategory'])->where('test_id',$testID);

    //         $table = Datatables::of($query);


    //         $table->editColumn('id', function ($row) {
    //             return  $row->id ?? 'Not Set';
    //         });
    //         $table->editColumn('name', function ($row) {
    //             return $row->name ?? 'Not Set';
    //         });
    //         $table->editColumn('subjectCategory', function ($row) {
    //             return $row->subjectCategory->name ?? 'No Name';
    //         });
    //         $table->editColumn('created_at', function ($row) {
    //             return $row->created_at ?? '';
    //         });
    //         $table->addColumn('actions', '&nbsp;');
    //         $table->editColumn('actions', function ($row) {
    //             //Set the values to 1 to be viewable on display
    //             $view = 1;
    //             $edit = 1;
    //             $delete = 1;
    //             $routePart = 'admin.questions';

    //             return view('layouts.partials.utilities.datatablesActions', compact(
    //                 'view',
    //                 'edit',
    //                 'delete',
    //                 'routePart',
    //                 'row'
    //             ));
    //         });

    //         $table->rawColumns(['id', 'name', 'subjectCategory', 'created_at', 'actions']);

    //         return $table->make(true);
    //     }
    //     return view('admin.questions.tests.index');
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::all();
        $answers = AnswerChoice::all();

        return view('admin.questions.create', compact('tests','answers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorequestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        // Validate other form inputs

        // Retrieve and decode the choices JSON
        $choices = json_decode($request->input('choices'), true);

        // Store the choices in the JSON field of your model
        $question = Question::create([
            'question' => $request->question,
            'choices' => $choices,
            'answer' => $request->answer,
            'short_answer' => $request->short_answer,
            'full_answer' => $request->full_answer,
            'test_id' => $request->test_id,
            'answer_resource' => $request->answer_resource,
            'question_image_path' => $request->question_image_path
        ]);


        return back()->with('success', 'Question is Created Successfully!');
    }



    public function createTestQuestion($testID)
    {
        $tests = Test::all();
        $answers = AnswerChoice::all();

        return view('admin.questions.create', compact('tests','answers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorequestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTestQuestion(StoreQuestionRequest $request, $testID)
    {
        // Validate other form inputs

        // Retrieve and decode the choices JSON
        $choices = json_decode($request->input('choices'), true);

        // Store the choices in the JSON field of your model
        $question = Question::create([
            'question' => $request->question,
            'choices' => $choices,
            'answer' => $request->answer,
            'short_answer' => $request->short_answer,
            'full_answer' => $request->full_answer,
            'test_id' => $testID,
            'answer_resource' => $request->answer_resource,
            'question_image_path' => $request->question_image_path
        ]);


        return back()->with('success', 'Question is Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.questions.show', compact('question'));
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
        return view('admin.questions.edit', compact('question', 'subjectDomains'));
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
        return back()->with('success', 'question (' . $question->name . ') is Updated Successfully!');
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
