@extends('layouts.app')

@section('content')
    <header class="c-landing">
        <div class="container h-100">
            <div class="row h-100 align-items-start">
                <div class="col-12 text-center pt-5">
                    <div class="p-4">
                        <h1 class="c-header-title">Pak je kans!</h1>
                        <p class="c-header-description">Bekijk onze nieuwste vacatures, en wie weet heb jij binnenkort de desbetreffende functie.</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="c-card shadow">
                                    <h5 class="c-card-title mb-3">Teamleider</h5>
                                    <p>Ai wollah goeie teamleider bij Dirk van Broek kom nu solliciteren</p>
                                    <a href="{{ url('/jobs/2') }}">Bekijk vacature >></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-card shadow">
                                    <h5 class="c-card-title mb-3">Teamleider</h5>
                                    <p>Ai wollah goeie teamleider bij Dirk van Broek kom nu solliciteren</p>
                                    <a href="{{ url('/jobs/1') }}">Bekijk vacature >></a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="c-card shadow">
                                    <h5 class="c-card-title mb-3">Teamleider</h5>
                                    <p>Ai wollah goeie teamleider bij Dirk van Broek kom nu solliciteren</p>
                                    <a href="{{ url('/jobs/3') }}">Bekijk vacature >></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
