@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>{{ $job->title }} vacature</h2>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <div class="p-4">
                            <form method="POST" action="{{ url('/jobs/react') }}">
                                @csrf

                                <label>
                                    <input value="{{ $job->id }}" name="jobid" type="text" style="display: none">
                                </label>

                                <div class="c-job-info-section">
                                    <h5>Functie</h5>
                                    <p>{{ $job->title }}</p>
                                </div>

                                <div class="c-job-info-section">
                                    <label for="jobaddon">
                                        <h5>Extra toevoeging</h5>
                                    </label>
                                    <textarea class="form-control" id="jobaddon" name="jobaddon" rows="3"></textarea>
                                </div>

                                <div class="c-job-info-section">
                                    <button class="btn btn-success p-3 c-job-react" type="submit">Solliciteer</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
