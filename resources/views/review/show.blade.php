@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $review->user->name }}'s review of {{ $review->fundraiser->name }}
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
                                <span class="text-warning">
                                    @for ($i = 0; $i < $review->stars; $i++)
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    @endfor
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $review->comments }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
