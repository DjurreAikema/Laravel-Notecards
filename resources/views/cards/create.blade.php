@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="offset-md-2"></div>
        <div class="col-md-4">
            <div>
                <h4>Create a new card</h4>
                <hr>
            </div>

            {{-- Create card form --}}
            <form method="POST" action="{{ route('store.card') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Card title</label>
                    <input name="title" type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="subtitle">Card subtitle</label>
                    <input name="subtitle" type="text" class="form-control {{ $errors->has('subtitle') ? ' is-invalid' : '' }}" id="subtitle" value="{{ old('subtitle') }}">
                    @if ($errors->has('subtitle'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('subtitle') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cardcontent">Card content</label>
                    <input name="cardcontent" type="text" class="form-control {{ $errors->has('cardcontent') ? ' is-invalid' : '' }}" id="cardcontent" value="{{ old('cardcontent') }}">
                    @if ($errors->has('cardcontent'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('cardcontent') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Card status</label>
                    <select name="status" class="form-control {{ $errors->has('cardcontent') ? ' is-invalid' : '' }}" id="status" value="{{ old('status') }}">
                        {{ var_dump($statuses) }}
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{ $status->status }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Save new card</button>
                </div>
            </form>
        </div>
        <div class="offset-md-3"></div>

        {{-- Side menu --}}
        <div class="col-md-3">
            <a class="btn btn-outline-success m-l-10 m-b-30">
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