@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('layouts.flash')
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h3>Bewerk vacature</h3>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <div class="form-group">
                            <a href="{{ url('/admin/jobs') }}"><< Ga terug</a>
                        </div>
                        <form method="POST" action="{{ url('/admin/jobs/update/' . $job->id) }}">
                            @csrf

                            <div class="form-group">
                                <label class="c-form-label" for="jobtitle">Vacature titel</label>
                                <div>
                                    <input class="form-control @error('jobtitle') is-invalid @enderror" id="jobtitle" value="{{ $job->title }}" type="text" name="jobtitle" required autofocus>
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
                                    <textarea class="form-control @error('jobdesc') is-invalid @enderror" id="jobdesc" name="jobdesc" rows="3">{{ $job->description }}</textarea>
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
                                    <textarea class="form-control @error('jobreq') is-invalid @enderror" id="jobreq" name="jobreq" rows="3">{{ $job->requirements }}</textarea>
                                </div>

                                @error('jobreq')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="c-form-label" for="jobstatus">Vacature status</label>
                                <div>
                                    <select id="jobstatus" name="jobstatus" class="form-select">
                                        <option value="0" {{ $job->enabled == 0 ? "selected" : null }}>Uitgeschakeld</option>
                                        <option value="1" {{ $job->enabled == 1 ? "selected" : null }}>Ingeschakeld</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button style="width:100%" type="submit" class="btn btn-primary">Vacature bijwerken</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
