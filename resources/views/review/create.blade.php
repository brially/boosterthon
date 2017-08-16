@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fundraiser Review Create
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
                                <form id="address-form" class="form-horizontal" method="POST" action="{{ action('ReviewController@store') }}">
                                    <input type="hidden" name="_method" value="post">
                                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                                    <input type="hidden" name="fundraiser_id" value="{{ $fundraiser->id }}">
                                    {{ csrf_field() }}


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
                                                   name="comments" value="{{ old('comments')  }}" ></textarea>

                                            @if ($errors->has('comments'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comments') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group"> <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary pull-right">Save!</button>
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
