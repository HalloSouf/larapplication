@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h3>Openstaande vacatures</h3>
                </div>

                <div class="container w-100 mt-4">
                    <div class="row">
                        @include('layouts.flash')
                        @foreach($jobs as $job)
                            <div class="col-md-4 mt-4">
                                <div class="card shadow-sm p-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $job->title }}</h5>
                                        <p class="card-text text-start">{{ $job->description }}</p>
                                        <a class="card-link" href="{{ url('/jobs/' . $job->id)  }}">Open vacature</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{ $jobs->links() }}
            </div>
        </div>
    </div>
@endsection
