@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('layouts.flash')
        <div class="row">
            <div class="col-md-8">
                <div class="text-center">
                    <h3>Maak een nieuwe vacature aan</h3>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/jobs/create') }}">
                            @csrf

                            <div class="form-group">
                                <label class="c-form-label" for="jobtitle">Vacature titel</label>
                                <div>
                                    <input class="form-control @error('jobtitle') is-invalid @enderror" id="jobtitle" type="text" name="jobtitle" required autofocus>
                                </div>

                                @error('jobtitle')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="c-form-label" for="jobdesc">Vacature beschrijving</label>
                                <div>
                                    <textarea class="form-control @error('jobdesc') is-invalid @enderror" id="jobdesc" name="jobdesc" rows="3"></textarea>
                                </div>

                                @error('jobdesc')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="c-form-label" for="jobreq">Functie vereisten</label>
                                <div>
                                    <textarea class="form-control @error('jobreq') is-invalid @enderror" id="jobreq" name="jobreq" rows="3"></textarea>
                                </div>

                                @error('jobreq')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button style="width:100%" type="submit" class="btn btn-primary">Maak aan</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-md-0">
                <div class="text-center">
                    <h3>Vacatures</h3>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @if (count($jobs) < 1)
                                <li class="list-group-item">
                                    Geen open vacatures.
                                </li>
                            @else
                                @foreach($jobs as $job)
                                    <li class="list-group-item">
                                        <h5><a class="c-link text-dark" href="{{ url('/admin/jobs/' . $job->id) }}">{{ $job->title }}</a></h5>
                                        <div>
                                            <a class="c-link" href="{{ url('/admin/jobs/delete/' . $job->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'removejob' . $job->id }}').submit();"><i class="far fa-trash-alt"></i> Verwijderen</a>
                                            <a class="ms-2 c-link" href="{{ url('/admin/jobs/edit/' . $job->id) }}"><i class="far fa-keyboard"></i> Bewerken</a>
                                            <form id="{{ 'removejob' . $job->id }}" action="{{ url('/admin/jobs/delete/' . $job->id) }}" method="POST" style="display: none">@csrf</form>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
