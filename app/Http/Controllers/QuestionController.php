<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\AnswerChoice;
use App\Models\Test;
use App\Models\Topic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
            $query = Question::all();

            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('question', function ($row) {
                return $row->question ?? 'Not Set';
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

            $table->rawColumns(['id', 'question', 'answer', 'short_answer','created_at', 'actions']);

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
        $topics = Topic::all();

        return view('admin.questions.create', compact('tests','answers','topics'));
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
            'topic_id' => $request->topic_id,
            'answer_resource' => $request->answer_resource,
            'question_image_path' => $request->question_image_path
        ]);


        return back()->with('success', 'Question is Created Successfully!');
    }



    public function createTestQuestion($testID)
    {
        $test = Test::findOrFail($testID);
        $answers = AnswerChoice::all();
        $topics = Topic::wheretest_id($testID)->cursor();
        return view('admin.questions.test-questions', compact('test','answers','topics'));
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
            'topic_id' => $request->topic_id,
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
        $tests = Test::all();
        $topics = Topic::all();
        $answers = AnswerChoice::all();
        return view('admin.questions.edit', compact('question', 'tests','topics','answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatequestionRequest  $request
     * @param  \App\Models\question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $choices = json_decode($request->input('choices'), true);
        $question->update([
            'question' => $request->question,
            'choices' => $choices,
            'answer' => $request->answer,
            'short_answer' => $request->short_answer,
            'full_answer' => $request->full_answer,
            'test_id' => $request->test_id,
            'topic_id' => $request->topic_id,
            'answer_resource' => $request->answer_resource,
            'question_image_path' => $request->question_image_path
        ]);
        return back()->with('success', 'Question  is Updated Successfully!');
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
