@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('layouts.flash')
        <div class="row p-4">
            <div class="col-12 text-center">
                <h1>Reactie {{ $job->title }} (ID: {{ $reaction->id }}) {!! $reaction->passed === null ? '<span class="badge bg-secondary">Geen antwoord</span>' : ($reaction->passed === 1 ? '<span class="badge bg-success">Geaccepteerd</span>' : '<span class="badge bg-danger">Geweigerd</span>' ) !!}</h1>
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
                                <div class="form-group c-vacs-form-group p-2">
                                    <a href="{{ url('/admin/reactions/approve/' . $reaction->id) }}" class="btn btn-success" role="button" onclick="event.preventDefault(); document.getElementById('approve-form').submit();">Accepteren</a>
                                    <a href="{{ url('/admin/reactions/decline/' . $reaction->id) }}" class="btn btn-danger" role="button" onclick="event.preventDefault(); document.getElementById('decline-form').submit();">Weigeren</a>
                                    <a href="{{ url('/admin/reactions/delete/' . $reaction->id) }}" class="btn btn-warning" role="button" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">In prullenbak</a>
                                    <form id="delete-form" action="{{ url('/admin/reactions/delete/' . $reaction->id) }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                    <form id="approve-form" action="{{ url('/admin/reactions/approve/' . $reaction->id) }}" method="POST" style="display: none">
                                        @csrf
                                    </form>
                                    <form id="decline-form" action="{{ url('/admin/reactions/decline/' . $reaction->id) }}" method="POST" style="display: none">
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
