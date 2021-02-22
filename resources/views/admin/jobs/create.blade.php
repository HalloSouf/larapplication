@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('layouts.flash')
        <div class="row p-4">
            <div class="col-12 text-center">
                <h1>Maak een vacature aan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="card w-100 shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/jobs/create') }}">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group c-vacs-form-group">
                                        <label class="c-login-label" for="jobtitle">Vacature titel</label>
                                        <div>
                                            <input class="form-control @error('jobtitle') is-invalid @enderror" id="jobtitle" type="text" name="jobtitle" required autofocus>
                                        </div>

                                        @error('jobtitle')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group c-vacs-form-group">
                                        <label class="c-login-label" for="jobid">Vacature ID</label>
                                        <div>
                                            <input class="form-control @error('jobid') is-invalid @enderror" id="jobid" type="text" name="jobid" required autofocus>
                                        </div>

                                        @error('jobid')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group c-vacs-form-group">
                                        <label class="c-login-label" for="jobsalary">Salaris</label>
                                        <div>
                                            <input class="form-control @error('jobsalary') is-invalid @enderror" id="jobsalary" type="text" name="jobsalary" required autofocus>
                                        </div>

                                        @error('jobsalary')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group c-vacs-form-group">
                                        <label class="c-login-label" for="jobhours">Uren per week</label>
                                        <div>
                                            <input class="form-control @error('jobhours') is-invalid @enderror" id="jobhours" type="text" name="jobhours" required autofocus>
                                        </div>

                                        @error('jobhours')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group c-vacs-form-group">
                                        <label class="c-login-label" for="jobdate">Eind datum</label>
                                        <div>
                                            <input class="form-control @error('jobdate') is-invalid @enderror" id="jobdate" type="date" name="jobdate" required autofocus>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group c-vacs-form-group">
                                <label class="c-login-label" for="jobdesc">Vacature beschrijving</label>
                                <div>
                                    <textarea class="form-control @error('jobdesc') is-invalid @enderror" id="jobdesc" name="jobdesc" rows="3"></textarea>
                                </div>

                                @error('jobdesc')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group c-vacs-form-group">
                                <label class="c-login-label" for="jobreq">Functie vereisten</label>
                                <div>
                                    <textarea class="form-control @error('jobreq') is-invalid @enderror" id="jobreq" name="jobreq" rows="3"></textarea>
                                </div>

                                @error('jobreq')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group c-vacs-form-group">
                                <div id="jobquestions">
                                    <div id="jobquestion1">
                                        <label class="c-login-label" for="jobq1">Vraag 1</label>
                                        <input class="form-control" id="jobq1" type="text" name="jobq1" required autofocus>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a class="link-success" style="text-decoration: none" onclick="addQuestion()"><i class="fas fa-plus"></i> Toevoegen</a>
                                    <a class="link-danger" style="text-decoration: none; margin-left: 10px;" onclick="removeQuestion()"><i class="fas fa-trash-alt"></i> Verwijderen</a>
                                </div>
                            </div>

                            <div class="form-group c-vacs-form-group">
                                <div class="col">
                                    <button style="width:100%" type="submit" class="btn btn-primary">Maak aan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
