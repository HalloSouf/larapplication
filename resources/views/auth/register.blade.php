@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row p-4">
            <div class="col align-self-center">
                <h1 class="c-header-title text-center">Maak een account aan!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="c-form-label" for="firstname">Voornaam</label>
                                        <div>
                                            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                            @error('firstname')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="c-form-label" for="lastname">Achternaam</label>
                                        <div>
                                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                            @error('lastname')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="c-form-label" for="email">E-mailadres</label>
                                <div>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="c-form-label" for="password">Wachtwoord</label>
                                        <div>
                                            <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="c-form-label" for="password-confirm">Bevestig wachtwoord</label>
                                        <div>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button style="width:100%" type="submit" class="btn btn-success">Registeren</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <span>Al een acount? <a href="{{ route('login') }}">Klik hier om in te loggen!</a></span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
