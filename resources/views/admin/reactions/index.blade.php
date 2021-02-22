@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('layouts.flash')

            @if (count($reactions) < 1)
                <div class="container text-center mt-5">
                    <div class="col-12">
                        <h3>Er zijn jammer genoeg nog geen reacties beschikbaar...</h3>
                    </div>
                </div>
            @else
                @foreach ($reactions as $reaction)
                    <div class="col-lg-6">
                        <div class="card shadow-sm c-vacs-card">
                            <div class="mt-4">
                                <div class="pt-2 p-2 c-vacs-label"><span class="mx-3 text-white">Reactie</span></div>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title p-2 mt-2">{{ \App\Models\Jobs::find($reaction->job)->title }}</h4>
                                <div class="row mx-1 mt-3">
                                    <p>
                                        <span class="fw-bold">{{ \App\Models\User::find($reaction->user)->email }}</span> heeft gereageerd op <span class="fw-bold">{{ $reaction->created_at }}</span> op deze vacature.
                                    </p>

                                    <a href="{{ url('/admin/reactions/' . $reaction->id) }}" class="p-3 c-vacs-links">Bekijk reactie <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
