@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row p-4">
        <div class="col-12 text-center">
            <h1>Gebruikers</h1>
            @include('layouts.flash')
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="card w-100 shadow-sm">
                <div class="card-body">
                    <ul class="list-group">
                        @if (count($users) < 1)
                            <li class="list-group-item">
                                Geen gebruikers gevonden!
                            </li>
                        @else
                            @foreach ($users as $user)
                                <li class="list-group-item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <span class="fw-bold">{{ $user->email }} {{ $user->id == \Illuminate\Support\Facades\Auth::id() ? '(Jij)' : '' }}</span>
                                            </div>
                                            <div class="col-sm-4">
                                                @if ($user->role == 1)
                                                    <a class="fw-bold text-warning" href="{{ url('/admin/users/admin/add/' . $user->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'addadmin'. $user->id }}').submit();"><i class="fas fa-edit"></i> Admin toevoegen</a>
                                                @else
                                                    <a class="fw-bold text-warning" href="{{ url('/admin/users/admin/delete/' . $user->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'removeadmin'. $user->id }}').submit();"><i class="fas fa-edit"></i> Admin verwijderen</a>
                                                @endif
                                                <a class="mx-lg-2 fw-bold text-danger" href="{{ url('/admin/users/delete/' . $user->id) }}" onclick="event.preventDefault(); document.getElementById('{{ 'deleteuser'  . $user->id }}').submit();"><i class="fas fa-trash-alt"></i> Verwijderen</a>
                                                    <form id="{{ 'removeadmin' . $user->id }}" action="{{ url('/admin/users/admin/delete/' . $user->id) }}" method="POST" style="display: none">@csrf</form>
                                                    <form id="{{ 'addadmin' . $user->id }}" action="{{ url('/admin/users/admin/add/' . $user->id) }}" method="POST" style="display: none">@csrf</form>
                                                <form id="{{ 'deleteuser' . $user->id }}" action="{{ url('/admin/users/delete/' . $user->id) }}" method="POST" style="display: none">@csrf</form>
                                            </div>
                                        </div>
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
