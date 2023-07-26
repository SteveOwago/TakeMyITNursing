@extends('layouts.backend')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3> Dashboard <a href="{{ route('admin.tests.index') }}"
                                class="btn btn-success float-start float-lg-end">Check All Available Tests</a></h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        {{-- Student Dashboard and Home Section --}}
                        @role('Student')
                            <div class="row">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5>My Tests</h5>
                                            <p> Total Tests: <span
                                                    class="">{{ number_format($dashboardStatistics['tests_taken']->count(), 0) }}</span>
                                            </p>

                                            <a href="{{ route('admin.tests.index') }}" class="btn btn-success">Take Exam
                                                Tests</a>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Latest Test:</h5>
                                            <p> Test Name:
                                                <span>{{ $dashboardStatistics['latest_test']->test->name ?? 'No Test Attempted' }}</span>
                                            </p>
                                            <p> Test Score: <span
                                                    class="">{{ $dashboardStatistics['latest_test']->score ?? 'No Test Attempted' }}</span>
                                            </p>
                                            <div class="text-center">
                                                <a href="{{ route('admin.tests.students.results', [auth()->user()->id]) }}"
                                                    class="btn btn-primary">My Test
                                                    Results</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Subscription Information</h5>
                                            <p>Subscription Status:
                                                <span>{{ $dashboardStatistics['subscription_status'] ?? 'INACTIVE' }}</span>
                                            </p>
                                            <p>Subscription Plan:
                                                <span>{{ $dashboardStatistics['subscription_plan'] ?? 'INACTIVE' }}</span>
                                            </p>
                                            <p>Subscription End Date:
                                                <span>{{ $dashboardStatistics['subscription_end_date'] ?? 'INACTIVE' }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="card">
                                    <div class="row">
                                        @forelse ($topCategories as $category)
                                            <div class="col-4">
                                                <h6>Category: {{ $category->name }}</h6>
                                                <p>Test Exams Available: {{ $category->tests->count() }}</p>
                                                @php
                                                    $items = $category->tests->shuffle()->take(3);
                                                @endphp

                                                @forelse ($items as $item)
                                                    <p>Test Exam: Click <a
                                                            href="{{ route('student.tests.show', $item->id) }}">{{ $item->name }}</a>
                                                        To Take This Exams</p>
                                                @empty
                                                    <p>No Exams in Section</p>
                                                @endforelse
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="row mt-2">
                                        <div class="text-center">
                                            <p class="lead">Click <a href="{{ route('admin.tests.index') }}">here</a> to Explore
                                                More Exams</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endrole

                        {{-- Admin Section --}}
                        @role('Admin')
                            <div class="row">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>Total Students</h5>
                                            <p> All Student Count: <span
                                                    class="">{{ number_format($dashboardStatistics['totalStudents'], 0) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Total Questions</h5>
                                            <p> All Questions Count: <span
                                                    class="">{{ number_format($dashboardStatistics['totalQuestions'], 0) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Total Visitors Tests</h5>
                                            <p> All Student Count: <span
                                                    class="">{{ number_format($dashboardStatistics['totalVisitors'], 0) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Total Tests</h5>
                                            <p> All Tests Available Count: <span
                                                    class="">{{ number_format($dashboardStatistics['totalTests'], 0) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <h5>Total Amount</h5>
                                            <p> All Amount: <span
                                                    class="">$ {{ number_format($dashboardStatistics['totalAmount'], 0) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Amount Today</h5>
                                            <p> Today: <span
                                                    class="">$ {{ number_format($dashboardStatistics['totalAmountToday'], 0) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Amount This Week</h5>
                                            <p> Week: <span
                                                    class="">$ {{ number_format($dashboardStatistics['totalAmountWeek'], 0) }}</span>
                                            </p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Amount This Month</h5>
                                            <p> Month: <span
                                                    class="">$ {{ number_format($dashboardStatistics['totalAmountMonth'], 0) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="card">
                                    <div class="row">
                                        <table class="table table-horizontal table-responsive">
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Email</th>
                                                <th>Subscription Status</th>
                                                <th>Subsctiption Package</th>
                                                <th>Date Joined</th>
                                            </tr>
                                            @forelse ($dashboardStatistics['students'] as $student)
                                                <tr>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->created_at }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">No Students Yet</td>
                                                </tr>
                                            @endforelse


                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endrole
                        {{-- End Student Dashboard and Home Section --}}
                        {{-- Posts Section --}}

                        {{-- <div class="card">
                            <div class="card-header bg-primary"><h3>Customer Queries</h3></div>

                            <div class="card-body">
                                <div class="col-sm-12">
                                    @if (count($posts) > 0)
                                        @foreach ($posts as $post)
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <strong>At: {{ $post->created_at->format('d M Y - H:i:s') }}</strong> || <small><strong>{{$post->name}}</strong></small> || {{$post->phone}} || {{$post->email}}
                                                        </div>
                                                        <div class="card-body">
                                                            <h4>{{$post->subject}}</h4>
                                                            <p>{{$post->message}}</p>
                                                            <form method="POST" action="posts/{{$post->id}}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}

                                                                <div class="form-group">
                                                                    <input type="submit" class="btn btn-danger delete-user" value="Delete Message">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                <hr>
                                        @endforeach
                                    @else
                                    <p>No Customer Queries Posted</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        {{$posts->links("pagination::bootstrap-4")}} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
