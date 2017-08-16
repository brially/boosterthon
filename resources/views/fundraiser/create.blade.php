@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        New Fundraiser
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
                                                     document.getElementById('fundraiser-form').submit();">
                                <span class="glyphicon glyphicon-floppy-save text-success" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="fundraiser-form" class="form-horizontal" method="POST"
                                      action="{{ action('FundraiserController@store') }}">
                                    <input type="hidden" name="_method" value="post">
                                    {{ csrf_field() }}


                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-4 control-label">Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control"
                                                   name="name" value="{{ old('name') }}"
                                                   required autofocus
                                            >

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
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
