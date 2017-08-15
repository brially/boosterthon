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
                                                     document.getElementById('address-form').submit();">
                                <span class="glyphicon glyphicon-floppy-save text-success" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="address-form" class="form-horizontal" method="POST" action="{{ action('ReviewController@store') }}">
                                    <input type="hidden" name="_method" value="post">
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <label for="address" class="col-md-4 control-label">Comment</label>

                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control"
                                                   name="address" value="{{ old('comment')  }}" required autofocus>

                                            @if ($errors->has('comment'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('stars') ? ' has-error' : '' }}">
                                        <label for="address2" class="col-md-4 control-label">Stars</label>

                                        <div class="col-md-6">
                                            <input id="address2" type="number" class="form-control"
                                                   name="address2" value="{{ old('stars') }}"  >

                                            @if ($errors->has('stars'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('stars') }}</strong>
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
