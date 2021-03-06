@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fundraisers <a class="btn btn-xs btn-success" href="{{ action('FundraiserController@create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a> </div>
                <table class="table table-striped table table-responsive">
                    <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        # Reviews
                    </th>
                    <th>
                        Avg. Stars
                    </th>
                    <th>
                        Action
                    </th>
                    </thead>
                    <tbody>
                        @forelse($fundraisers as $fundraiser )
                            <tr>
                                <td>
                                    <a class="btn btn-xs btn-info"
                                       href="{{ action('ReviewController@index', ['fundraiser_id'=>$fundraiser->id]) }}">
                                        {{ $fundraiser->name }}
                                    </a>
                                </td>
                                <td>{{ $fundraiser->reviews()->count() }}</td>
                                <td>
                                    @if( $fundraiser->reviews()->count()  > 0 || $fundraiser->reviews->sum('stars') > 0)
                                        <span class="text-warning">
                                            @for ($i = 0; $i < $fundraiser->reviews->sum('stars') / $fundraiser->reviews()->count(); $i++)
                                                <span class="fa fa-star" aria-hidden="true"></span>
                                            @endfor
                                        </span>
                                    @endif
                                </td>
                                <td>
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
