@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fundraisers <a class="btn btn-xs btn-success" href="{{ action('FundraiserController@create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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
                                <td>{{ $fundraiser->name }}</td>
                                <td>{{ $fundraiser->reviews()->count() }}</td>
                                <td>
                                    {{ $fundraiser->reviews()->count()  > 0 ? $fundraiser->reviews->sum('stars') / $fundraiser->reviews()->count()  : 0 }}
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info"
                                       href="{{ action('ReviewController@create', ['fundraiser_id'=>$fundraiser->id]) }}">
                                        Review
                                    </a>
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
