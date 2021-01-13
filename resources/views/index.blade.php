@extends('layouts.app')

@section('content')
    <header class="c-header">
        <div class="container h-100">
            <div class="row h-100 align-items-start">
                <div class="col-12 pt-5">
                    <div class="p-4 text-center">
                        <h1 class="c-header-title">Pak je kans!</h1>
                        <p class="c-header-description">Bekijk nu onze nieuwste vacatures, en wie weet heb jij binnenkort de desbetreffende functie.</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            @foreach($jobs as $job)
                                <div class="col-md-4">
                                    <div class="card shadow-sm p-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $job->title }}</h5>
                                            <p class="card-text text-start">{{ $job->description }}</p>
                                            <a class="card-link t" href="{{ url('/jobs/'. $job->id) }}">Bekijk vacature</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
