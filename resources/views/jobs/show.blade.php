@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row p-4">
            <div class="col-12 text-center">
                <h1>{{ $job->title }} (ID: {{ $job->jobnumber }})</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-100 shadow-sm">
                    <div class="card-body">

                        <div class="container">

                            <div class="row p-2">
                                <a class="c-vac-collapse-link fw-bold " href="#CollapseDesc" data-bs-toggle="collapse" aria-expanded="false" aria-controls="CollapseDesc">
                                    <div class="container">
                                        Functie omschrijving <i class="fas fa-feather"></i>
                                    </div>
                                </a>
                                <div class="collapse show" id="CollapseDesc">
                                    <div class="container d-flex justify-content-start">
                                        <div class="row p-3">
                                            <div class="col-md-6">
                                                <dl class="row">
                                                    <dt class="col-sm-6">Uren per week</dt>
                                                    <dd class="col-sm-6">{{ $job->hours }}</dd>
                                                    <dt class="col-sm-6">Maandsalaris</dt>
                                                    <dd class="col-sm-6">€ {{ $job->salary }}</dd>
                                                </dl>
                                            </div>
                                            <div class="col-md-6">
                                                <dl class="row">
                                                    <dt class="col-sm-6">Reageren voor</dt>
                                                    <dd class="col-sm-6">{{ $job->end_date }}</dd>
                                                    <dt class="col-sm-6">Vacature ID</dt>
                                                    <dd class="col-sm-6">{{ $job->jobnumber }}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        @php($bbcode = new \Genert\BBCode\BBCode())
                                            {!! $bbcode->convertToHtml($job->description) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row p-2">
                                <a class="c-vac-collapse-link fw-bold " href="#CollapseReq" data-bs-toggle="collapse" aria-expanded="false" aria-controls="CollapseReq">
                                    <div class="container">
                                        Functie vereisten <i class="fas fa-exclamation"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="CollapseReq">
                                    <div class="container d-flex justify-content-start">
                                        <div class="row p-3">
                                            @php($bbcodee = new \Genert\BBCode\BBCode())
                                                {!! $bbcodee->convertToHtml($job->requirements) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container p-2 mx-5">
                            <a href="{{ url('/jobs/react/' . $job->id) }}" class="btn btn-success" role="button">Reageren</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
