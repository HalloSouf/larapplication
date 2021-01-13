@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Vacature reacties</h3>
                </div>

                <div class="container w-100 mt-4">
                    <div class="row">
                        @include('layouts.flash')
                        @foreach ($reactions as $reaction)
                            <div class="col-md-4 mt-4">
                                <div class="card shadow-sm p-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{  \App\Models\JobModel::find($reaction->job) ? \App\Models\JobModel::find($reaction->job)->title : 'Niet gevonden' }}</h5>
                                        <p class="card-text"><strong>{{ \App\Models\User::find($reaction->user) ? \App\Models\User::find($reaction->user)->firstname . ' ' . \App\Models\User::find($reaction->user)->lastname : 'onbekend' }}</strong> heeft gereageerd op <strong>{{ $reaction->created_at }}</strong></p>
                                        <a class="card-link" href="{{ url('/admin/jobs/reactions/' . $reaction->id) }}">Bekijk reactie</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
