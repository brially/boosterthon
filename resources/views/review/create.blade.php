@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Review For {{ $fundraiser->name  }}
                        <div class="btn-group btn-group-sm pull-right" role="group" aria-label="...">
                            <a href="{{ url()->previous()  }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left text-success" aria-hidden="true"></span>
                            </a>
                            <a href="{{ route('home') }}"
                               class="btn btn-default">
                                <span class="glyphicon glyphicon-home text-success" aria-hidden="true"></span>
                            </a>
                            <a href="{{ route('home') }}"
                               class="btn btn-default"
                               onclick="event.preventDefault();
                                                     document.getElementById('review-form').submit();">
                                <span class="glyphicon glyphicon-floppy-save text-success" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="address-form" class="form-horizontal" method="POST" action="{{ \Auth::check()  ? action('ReviewController@store') : route('guest-review-post')  }}">
                                    <input type="hidden" name="_method" value="post">

                                    <input type="hidden" name="fundraiser_id" value="{{ $fundraiser->id }}">
                                    {{ csrf_field() }}

                                    @if(\Auth::check())
                                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                    @else
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
                                        <label for="stars" class="col-md-4 control-label">Stars</label>

                                        <div class="col-md-6">
                                            <input id="stars" type="number" class="form-control"
                                                   name="stars" value="{{ old('stars') }}"
                                                   required autofocus
                                                   min="1" max="5"
                                            >

                                            @if ($errors->has('stars'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('stars') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('comments') ? ' has-error' : '' }}">
                                        <label for="comments" class="col-md-4 control-label">Comment</label>

                                        <div class="col-md-6">
                                            <textarea id="comments" type="text" class="form-control"
                                                   name="comments" required >{{ old('comments')  }}</textarea>

                                            @if ($errors->has('comments'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comments') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group"> <!-- Submit Button -->
                                        <div class="col-md-offset-4 col-md-6">
                                            <button type="submit" class="btn btn-default ">
                                                <span class="text-success">Save </span>
                                                <span class="glyphicon glyphicon-floppy-save text-success" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
