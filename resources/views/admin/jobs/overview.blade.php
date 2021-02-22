@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row p-4">
            <div class="col-12 text-center">
                <h1>Alle vacatures</h1>
                @include('layouts.flash')
            </div>
        </div>
        <div class="row">
            @if (count($jobs) < 1)
                <div class="container text-center mt-5">
                    <div class="col-12">
                        <h3>Er zijn nog geen vacatures aagemaakt...</h3>
                    </div>
                </div>
            @else
                <div class="col-12 d-flex justify-content-center">
                    <div class="card w-100 shadow-sm">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($jobs as $job)
                                    <li class="list-group-item">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <span class="fw-bold">{{ $job->title }}</span> (ID: {{ $job->jobnumber  }}) [{{ $job->enabled == 0 ? 'Uitgeschakeld' : 'Ingeschakeld' }}]
                                                </div>
                                                <div class="col-sm-3">
                                                    <a class="fw-bold text-warning" href="{{ url('/admin/jobs/edit/' . $job->id) }}"><i class="fas fa-edit"></i> Bewerken</a>
                                                    <a class="mx-lg-2 fw-bold text-danger" href="{{ url('/admin/jobs/delete/' . $job->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'deletejob' . $job->id }}').submit();"><i class="fas fa-trash-alt"></i> Verwijderen</a>
                                                    <form id="{{ 'deletejob' . $job->id }}" action="{{ url('/admin/jobs/delete/' . $job->id) }}" method="POST" style="display: none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
