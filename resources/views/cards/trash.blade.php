@extends('layouts.app')

@section('content')
    {{-- Session flash --}}
    @include('layouts.includes.flash')
    <div class="row w-100 p-b-100">
        <div class="offset-md-1"></div>
        {{-- Show softdeleted cards --}}
        <div class="col-md-8">
            <div class="row p-3 trashed-cards">
                @if($cards->isEmpty())
                    <div class="col-md-4 p-1">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">You have no trashed cards</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <hr>
                                </h6>
                                <p class="card-text">Came back when you have trashed some of your cards!</p>
                            </div>
                        </div>
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
                                {{-- Choose status dropdown --}}
                                <div class="dropdown float-left">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                           href="{{ route('choose.card.status', ['card' => $card->id,1]) }}">Waiting
                                        </a>
                                        <a class="dropdown-item"
                                           href="{{ route('choose.card.status', ['card' => $card->id,2]) }}">Active
                                        </a>
                                        <a class="dropdown-item"
                                           href="{{ route('choose.card.status', ['card' => $card->id,3]) }}">Finished
                                        </a>
                                    </div>
                                </div>
                                <div class="float-right">
                                    {{-- Delete card --}}
                                    <a href="{{ route('delete.card', $card->id) }}"
                                       class="card-link btn btn-outline-danger "><i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Side menu --}}
        <div class="col-md-3">
            <div class="side-menu p-l-30 p-t-20 p-b-50 shadow">
                <a class="btn btn-outline-info m-l-10 m-b-20 m-t-20" href="{{ route('create.card') }}">
                    Add new card
                </a>
                <hr class="m-r-35 aluminium">
                <ul>
                    <li><a href="{{ route('finished.card') }}">View finished cards</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection