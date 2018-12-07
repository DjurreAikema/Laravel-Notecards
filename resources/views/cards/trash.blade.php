@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-md-1">

        </div>
        <div class="col-md-8">
            <div class="row p-3">
                @if($cards->isEmpty())
                    <div class="offset-md-3"></div>
                    <div class="col-md-8">
                        <h1>There are no cards in your trash bin</h1>
                    </div>
                @endif
                @foreach($cards as $card)
                    <div class="card col-md-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $card->subtitle }}</h6>
                            <p class="card-text">{{ $card->content }}</p>
                            <hr>
                            <a href="#" class="card-link">Restore card</a>
                            <a href="{{ route('delete.card', $card->id) }}" class="card-link btn btn-outline-danger ">Delete card</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <ul>
                <li>View finished cards</li>
            </ul>
        </div>
    </div>
@endsection