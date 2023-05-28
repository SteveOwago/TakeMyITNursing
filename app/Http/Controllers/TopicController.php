<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Topic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Topic::with(['test']);

            $table = Datatables::of($query);


            $table->editColumn('id', function ($row) {
                return  $row->id ?? 'Not Set';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ?? 'Not Set';
            });
            $table->editColumn('test', function ($row) {
                return $row->test->name ?? 'No Name';
            });
            $table->editColumn('created_at', function ($row) {
                return $row->created_at ?? '';
            });
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) {
                //Set the values to 1 to be viewable on display
                $view = 1;
                if (auth()->user()->hasrole('Admin') || auth()->user()->can('admin_management')) {
                    $routePart = 'admin.topics';
                    $edit = 1;
                    $delete = 1;
                } else {
                    $routePart = 'student.topics';
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

            $table->rawColumns(['id', 'name', 'test', 'created_at', 'actions']);

            return $table->make(true);
        }
        return view('admin.topics.index');
    }
    public function create()
    {
        $tests = Test::all();

        return view('admin.topics.create', compact('tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretopicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'test_id' => 'required|integer',
        ]);
        $topic = Topic::create([
            'name' => $request->name,
            'test_id' => $request->test_id,
            'description' => $request->description,
        ]);

        return back()->with('success', 'Topic (' . $topic->name . ') is Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, topic $topic)
    {
        if ($request->ajax()) {
            $query = Question::where('topic_id', $topic->id);

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
        return view('admin.topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $tests = Test::all();
        return view('admin.topics.edit', compact('topic', 'tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetopicRequest  $request
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, topic $topic)
    {
        $request->validate([
            'name' => 'required|string',
            'test_id' => 'required|integer',
        ]);
        $topic->update([
            'name' => $request->name,
            'test_id' => $request->test_id,
            'description' => $request->description,
        ]);
        return back()->with('success', 'topic (' . $topic->name . ') is Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(topic $topic)
    {
        //
    }
}
