@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="container mt-4 text-center">
                <h1>Statistieken</h1>
            </div>

            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row text-center p-2 fw-bold">
                                    <span><i class="fas fa-child"></i> Afwachtend</span>
                                </div>
                                <div class="row justify-content-center">
                                    {{ count($waiting) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row text-center p-2 fw-bold">
                                    <span><i class="far fa-check-square"></i> Geaccepteerd</span>
                                </div>
                                <div class="row justify-content-center">
                                    {{ count($passed) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row text-center p-2 fw-bold">
                                    <span><i class="far fa-times-circle"></i> Geweigerd</span>
                                </div>
                                <div class="row justify-content-center">
                                    {{ count($failed) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row text-center p-2 fw-bold">
                                    <span><i class="fas fa-users"></i> Gebruikers</span>
                                </div>
                                <div class="row justify-content-center">
                                    {{ count(\App\Models\User::all()) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">

                    <div class="justify-content-start">
                        <h4>Vacatures</h4>
                    </div>

                    <div class="container mt-3">
                        <div class="row justify-content-start">
                            @foreach($perjobstats as $jobstat)
                                <div class="col-sm-3">
                                    <div class="card shadow-sm">
                                        <div class="card-body">
                                            <div class="row text-center p-2 fw-bold">
                                                <span>{{ \App\Models\Jobs::find($jobstat['id'])->title }}</span>
                                            </div>
                                            <div class="row justify-content-center">
                                                <span>Afwachtend: {{ count($jobstat['waiting']) }}</span>
                                                <span>Geaccepteerd: {{ count($jobstat['accepted']) }}</span>
                                                <span>Geweigerd: {{ count($jobstat['declined']) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
