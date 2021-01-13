@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Vacature {{ \App\Models\JobModel::find($reaction->job) ? \App\Models\JobModel::find($reaction->job)->title : 'onbekend'  }} (#{{ $reaction->id  }})</h3>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <div class="p-4">
                            <div class="c-job-info-section">
                                <h5>Email</h5>
                                <p>{{ \App\Models\User::find($reaction->user) ?  \App\Models\User::find($reaction->user)->email : 'Onbekend' }}</p>
                            </div>
                            <div class="c-job-info-section">
                                <h5>Name</h5>
                                <p>{{ \App\Models\User::find($reaction->user) ?  \App\Models\User::find($reaction->user)->firstname . ' ' . \App\Models\User::find($reaction->user)->lastname : 'Onbekend' }}</p>
                            </div>
                            <div class="c-job-info-section">
                                <h5>Datum</h5>
                                <p>{{ $reaction->created_at }}</p>
                            </div>
                            <div class="c-job-info-section">
                                <h5>Toevoeging</h5>
                                <p>{{ $reaction->extra }}</p>
                            </div>
                            <div class="c-job-info-section">
                                <form method="POST" action="{{ url('/admin/jobs/reactions/delete/' . $reaction->id) }}">
                                    @csrf
                                    <button class="btn btn-danger p-3">Verwijderen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
