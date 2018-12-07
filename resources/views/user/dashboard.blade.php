@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-md-1">

        </div>
        <div class="col-md-8">
            <div class="row p-3 active-cards">
                @foreach($cards as $card)
                    <div class="card col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $card->subtitle }}</h6>
                            <p class="card-text">{{ $card->content }}</p>
                            <hr>
                            <a href="#" class="card-link">Card status</a>
                            <a href="{{ route('remove.card', $card->id) }}" class="card-link btn btn-outline-danger ">Remove card</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <a class="btn btn-outline-success m-l-10 m-b-20 m-t-20" href="{{ route('create.card') }}">
                Add new card
            </a>
            <hr class="m-r-100">
            <ul>
                <li>View finished cards</li>
                <li><a href="{{ route('trash.card') }}">View removed cards</a></li>
            </ul>
        </div>
    </div>
@endsection