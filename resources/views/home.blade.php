@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-header bg-primary"><h3>Customer Queries</h3></div>

                            <div class="card-body">
                                <div class="col-sm-12">
                                    @if(count($posts)>0)
                                        @foreach($posts as $post)
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
                        {{$posts->links("pagination::bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

