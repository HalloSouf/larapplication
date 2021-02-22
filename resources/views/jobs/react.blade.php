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
                        <form method="POST" action="{{ url('/jobs/react/' . $job->id) }}">
                            @csrf

                            @foreach($questions as $question)
                                <div class="form-group c-vacs-form-group">
                                    <label class="c-login-label" for="{{ 'jobq' . $question->id }}">{{ $question->question }}</label>
                                    <div>
                                        <input class="form-control @error('jobq' . $question->id) is-invalid @enderror" id="{{ 'jobq' . $question->id }}" name="{{ 'joba' . $question->id }}" type="text" required>
                                    </div>

                                    @error('jobq' . $question->id)
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endforeach

                            <div class="c-vacs-form-group form-group">
                                <div class="col">
                                    <button style="width:100%" type="submit" class="btn btn-success">Reageren</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
