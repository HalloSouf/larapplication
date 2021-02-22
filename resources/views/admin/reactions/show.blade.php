@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row p-4">
            <div class="col-12 text-center">
                <h1>Reactie {{ $job->title }} (ID: {{ $reaction->id }})</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card w-100 shadow-sm">
                    <div class="card-body">

                        <div class="container">

                           <div class="row">
                               <div class="col-12">
                                   <div class="form-group c-vacs-form-group c-login-label">
                                       <h5>Gebruikersinformatie</h5>
                                   </div>
                               </div>
                               <div class="col-sm-4">
                                   <div class="form-group c-vacs-form-group">
                                       <label class="fw-bold c-login-label">Naam</label>
                                       <div class="mx-1">
                                           <span>{{ $user->firstname . ' ' . $user->lastname }}</span>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-4">
                                   <div class="form-group c-vacs-form-group">
                                       <label class="fw-bold c-login-label">E-mailadres</label>
                                       <div class="mx-1">
                                           <span>{{ $user->email }}</span>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-sm-4">
                                   <div class="form-group c-vacs-form-group">
                                       <label class="fw-bold c-login-label">Aangemaakt op</label>
                                       <div class="mx-1">
                                           <span>{{ $user->created_at }}</span>
                                       </div>
                                   </div>
                               </div>
                           </div>

                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="form-group c-vacs-form-group c-login-label">
                                        <h5>Gegegeven reactie</h5>
                                    </div>
                                    @foreach($answers as $answer)
                                        <div class="form-group c-vacs-form-group">
                                            <label class="fw-bold c-login-label">{{ $answer['question'] }}</label>
                                            <div class="mx-2">
                                                <span>{{ $answer['answer']->answer }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="form-group c-vacs-form-group">
                                    <a href="{{ url('/admin/reactions/delete/' . $reaction->id) }}" class="btn btn-danger" role="button" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Verwijderen</a>
                                    <form id="delete-form" action="{{ url('/admin/reactions/delete/' . $reaction->id) }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
