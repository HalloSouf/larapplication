@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('layouts.flash')

            @if (count($jobs) < 1)
                <div class="container text-center mt-5">
                    <div class="col-12">
                        <h3>Er zijn jammer genoeg geen vacatures beschikbaar...</h3>
                    </div>
                </div>
            @else
                @foreach($jobs as $job)
                    <div class="col-lg-6">
                        <div class="card shadow-sm c-vacs-card">
                            <div class="mt-4">
                                <div class="pt-2 p-2 c-vacs-label"><span class="mx-3 text-white">Vacature</span></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title p-2 mt-2">{{ $job->title }}</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mx-3">
                                            <dl class="row">
                                                <dt class="col-sm-6">Uren per week</dt>
                                                <dd class="col-sm-6">{{ $job->hours }}</dd>
                                                <dt class="col-sm-6">Maandsalaris</dt>
                                                <dd class="col-sm-6">{{ $job->salary }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mx-3">
                                            <dl class="row">
                                                <dt class="col-sm-6">Reageren voor</dt>
                                                @php($now = time())
                                                @php($testdate = strtotime($job->end_date))
                                                @php($datediff = $testdate - $now)
                                                <dd class="col-sm-6">{{ $job->end_date }} <span class="badge c-vacs-badge">Nog {{ round($datediff / (60 * 60 * 24)) }} dagen</span></dd>
                                                <dt class="col-sm-6">Vacature ID</dt>
                                                <dd class="col-sm-6">{{ $job->jobnumber }}</dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-1 mt-3">
                                    <p>
                                        @php($bbcode = new \Genert\BBCode\BBCode())
                                        {!! $bbcode->convertToHtml(str_split($job->description, 190)[0]) !!}...
                                    </p>

                                    <a  href="{{ url('/jobs/' . $job->id) }}" class="p-3 c-vacs-links">Bekijk vacature <i class="fas fa-angle-double-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
