@extends('competition.layouts.master')
@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Choose a promo
                </div>

                <div class="links">
                    @foreach ($competitions as $competition)
                        <a href="/{{ $competition->slug }}">{{ $competition->name }}</a>
                    @endforeach
                </div>
            </div>
@endsection