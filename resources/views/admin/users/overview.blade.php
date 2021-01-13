@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        @include('layouts.flash')
        <div class="row">
            <div class="col-lg-12 mt-4 mt-md-0">
                <div class="text-center">
                    <h3>Beheer gebruikers</h3>
                </div>

                <div class="card shadow-sm w-100 mt-4">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @if (count($users) < 1)
                                <li class="list-group-item">
                                    Geen gebruikers gevonden.
                                </li>
                            @else
                                @foreach($users as $user)
                                    <li class="list-group-item">
                                        {{ $user->email }} {{ \Illuminate\Support\Facades\Auth::id() == $user->id ? '(jij)' : '' }}
                                        <div>
                                            <a class="c-link" href="{{ url('/admin/users/delete/'. $user->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'removeuser'. $user->id }}').submit();">Account verwijderen</a>
                                            -
                                            @if ($user->role == 1)
                                                <a class="c-link" href="{{ url('/admin/users/administrator/add/' . $user->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'addadmin' . $user->id }}').submit();">Administrator toevoegen</a>
                                            @else
                                                <a class="c-link" href="{{ url('/admin/users/administrator/delete/' . $user->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'removeadmin' . $user->id }}').submit();">Administrator verwijderen</a>
                                            @endif
                                        </div>
                                        <form id="{{ 'removeadmin' . $user->id }}" action="{{ url('/admin/users/administrator/delete/' . $user->id) }}" method="POST" style="display: none">@csrf</form>
                                        <form id="{{ 'addadmin' . $user->id }}" action="{{ url('/admin/users/administrator/add/' . $user->id) }}" method="POST" style="display: none">@csrf</form>
                                        <form id="{{ 'removeuser' . $user->id }}" action="{{ url('/admin/users/delete/' . $user->id) }}" method="POST" style="display: none">@csrf</form>
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
