@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div  class="text-center">
                    <h2>{{ $job->title }} vacature</h2>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <div class="p-4">
                            <div class="c-job-info-section">
                                <h5>Functie</h5>
                                <p>{{ $job->title }}</p>
                            </div>
                            <div class="c-job-info-section">
                                <h5>Omschrijving</h5>
                                <p>{{ $job->description }}</p>
                            </div>
                            <div class="c-job-info-section">
                                <h5>Vereisten</h5>
                                <p>{!! nl2br(e($job->requirements)) !!}</p>
                            </div>
                            <div class="c-job-info-section">
                                <h5>Geef nu je reactie!</h5>
                                <p>Deze vacature staat nog open. Reageer hier nu op, en wie weet heb jij binnenkort deze functie!</p>
                                <a class="btn btn-success p-3 c-job-react" role="button" href="{{ url('/jobs/react/' . $job->id) }}">Solliciteer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
