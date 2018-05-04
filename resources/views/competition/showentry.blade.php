@extends('competition.layouts.master')
@section('content')
            <div class="container p-3">
                <h1>
                    {{ $entry->firstname }} {{ $entry->lastname }}
                </h1>
                <p>{{ $entry->created_at->diffForHumans() }}</p>
                <div>
                    <img class="card-img-top" src="{{ asset('storage/images/' . $entry->url) }}" alt="">
                </div>
            </div>
@endsection
