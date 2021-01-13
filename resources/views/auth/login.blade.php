@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row p-4">
            <div class="col align-self-center">
                <h1 class="c-header-title text-center">Login met jouw account</h1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card shadow-sm" style="min-width: 600px">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label class="c-form-label" for="email">E-mailadres</label>
                                <div>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

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

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <div class="p-2">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Onthoud mij</label>
                                    </div>
                                    <div class="p-2">
                                        <a href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button style="width:100%" type="submit" class="btn btn-success">Inloggen</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <span>Nog geen account? <a href="{{ route('register') }}">Maak er één!</a></span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
