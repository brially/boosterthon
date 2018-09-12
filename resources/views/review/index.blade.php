@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $fundraiser->name }}
                    @if(\Auth::check())
                        <a class="btn btn-xs btn-info"
                           href="{{ action('ReviewController@create', ['fundraiser_id'=>$fundraiser->id]) }}">
                            Review
                        </a>
                    @else
                        <a class="btn btn-xs btn-info"
                           href="{{ route('guest-review', ['fundraiser_id'=>$fundraiser->id]) }}">
                            Review
                        </a>
                    @endif
                        </div>
                <table class="table table-striped table table-responsive">
                    <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Stars
                    </th>
                    <th>
                        Comment
                    </th>
                    </thead>
                    <tbody>
                        @forelse($fundraiser->reviews as $review )
                            <tr>
                                <td>{{ $review->user->name }}</td>
                                <td>
                                        <span class="text-warning">
                                            @for ($i = 0; $i < $review->stars ; $i++)
                                                <span class="fa fa-star" aria-hidden="true"></span>
                                            @endfor
                                        </span>
                                </td>
                                <td>
                                    {{ $review->comments }}
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
