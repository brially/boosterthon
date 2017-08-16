@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Fundraisers</div>
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
                                <td></td>
                                <td></td>
                                <td></td>
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
