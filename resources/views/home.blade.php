@extends('layouts.backend')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header"><h3> Dashboard <a href="{{route('admin.tests.index')}}" class="btn btn-success float-start float-lg-end">Check All Available Tests</a></h3></div>

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
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Latest Test:</h5>
                                          <p> Test Name: <span>{{ $dashboardStatistics['latest_test']->test->name ?? 'No Test Attempted' }}</span>
                                            </p>
                                        <p> Test Score: <span
                                                class="">{{ $dashboardStatistics['latest_test']->score ?? 'No Test Attempted' }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Subscription Information</h5>
                                        <p>Subscription Status: <span>{{$dashboardStatistics['subscription_status'] ?? 'INACTIVE'}}</span></p>
                                        <p>Subscription Plan: <span>{{$dashboardStatistics['subscription_plan'] ?? 'INACTIVE'}}</span></p>
                                        <p>Subscription End Date: <span>{{$dashboardStatistics['subscription_end_date'] ?? 'INACTIVE'}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="card">
                                <div class="row">
                                    @forelse ($topCategories as $category )
                                        <div class="col-4">
                                            <h6>Category: {{$category->name}}</h6>
                                            <p>Test Exams Available: {{$category->tests->count()}}</p>
                                        </div>
                                    @empty

                                    @endforelse
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
