@extends('competition.layouts.master')
@section('content')
      <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach ($entries as $entry)
                <div class="col-md-4">
                  <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ $entry->url }}" alt="Card image cap">
                    <div class="card-body">
                      <p class="card-text">{{ $entry->firstname }} {{ $entry->lastname }}</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $entry->created_at->diffForHumans() }}</small>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


