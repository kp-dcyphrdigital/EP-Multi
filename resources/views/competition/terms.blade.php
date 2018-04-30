@extends('competition.layouts.master')
@section('content')
            <div class="content">
                <div class="title m-b-md">
                    Entries
                </div>
                <div>
                    {{ $competition->terms }}
                </div>
            </div>
@endsection
