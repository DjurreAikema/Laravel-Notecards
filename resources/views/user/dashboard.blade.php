@extends('layouts.app')

@section('content')
    <div class="row w-100">
        <div class="offset-md-1">

        </div>
        <div class="col-md-8 p-r-30">
            {{-- Active cards --}}
            <div class="row p-3 active-cards">
                @foreach($cards as $card)
                    @if($card->status_id == 2)
                        <div class="col-md-6 p-3">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $card->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $card->subtitle }}</h6>
                                    <p class="card-text">{{ $card->content }}</p>
                                    <hr>
                                    <a href="#" class="card-link">Card status</a>
                                    <a href="{{ route('remove.card', $card->id) }}" class="card-link btn btn-outline-danger ">Remove card</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <hr class="m-t-35" style="border: 1px solid #D9D9D9">
            {{-- Waiting cards --}}
            <div class="row p-3 waiting-cards">
                @foreach($cards as $card)
                    @if($card->status_id == 1)
                        <div class="col-md-4 p-1">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $card->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $card->subtitle }}</h6>
                                    <p class="card-text">{{ $card->content }}</p>
                                    <hr>
                                    <a href="#" class="card-link">Card status</a>
                                    <a href="{{ route('remove.card', $card->id) }}" class="card-link btn btn-outline-danger ">Remove card</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <div class="side-menu p-l-30 p-t-20 p-b-50 shadow">
                <a class="btn btn-outline-info m-l-10 m-b-20 m-t-20" href="{{ route('create.card') }}">
                    Add new card
                </a>
                <hr class="m-r-35 aluminium">
                <ul>
                    <li>View finished cards</li>
                    <li><a href="{{ route('trash.card') }}">View removed cards</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection