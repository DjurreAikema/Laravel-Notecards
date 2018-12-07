@extends('layouts.app')

@section('content')
    {{-- Session flash --}}
    <div class="row w-100" style="height: 50px;">
        <div class="offset-md-2"></div>
        @if(session()->has('message'))
            <div id="successMessage" class="col-md-6" style="margin-top: -20px">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div>
        @endif
    </div>
    <div class="row w-100 p-b-100">
        <div class="offset-md-1"></div>
        {{-- Finished cards --}}
        <div class="col-md-8">
            <div class="row p-3 finished-cards">
                @if($cards->isEmpty())
                    <div class="offset-md-3"></div>
                    <div class="col-md-8">
                        <h1>You have no finished cards</h1>
                    </div>
                @endif
                @foreach($cards as $card)
                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $card->subtitle }}</h6>
                                <p class="card-text">{{ $card->content }}</p>
                                <hr>
                                <a href="#" class="card-link">Restore card</a>
                                <a href="{{ route('remove.card', $card->id) }}"
                                   class="card-link btn btn-outline-danger ">Remove card</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Side menu --}}
        <div class="col-md-3">
            <div class="side-menu p-l-30 p-t-20 p-b-50 shadow">
                <ul>
                    <li>View finished cards</li>
                </ul>
            </div>
        </div>
    </div>
@endsection