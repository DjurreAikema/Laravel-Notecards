@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-md-1">

        </div>
        <div class="col-md-8">
            @foreach($cards as $card)
                <div class="card" style="width: 30%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $card->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $card->subtitle }}</h6>
                        <p class="card-text">{{ $card->content }}</p>
                        <a href="#" class="card-link">Card status</a>
                        <a href="#" class="card-link">Remove card</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-3">
            <a class="btn btn-outline-success m-l-10 m-b-30" href="{{ route('create.card') }}">
                Add new card
            </a>
            <hr class="m-r-100">
            <ul>
                <li>View finished cards</li>
                <li>View removed cards</li>
            </ul>
        </div>
    </div>
@endsection