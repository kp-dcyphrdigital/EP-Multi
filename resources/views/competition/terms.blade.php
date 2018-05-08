@extends('competition.layouts.master')
@section('content')
            <div class="container p-3">
                <h1>
                    Terms and Conditions
                </h1>
                <div>
                    {!! $competition->terms !!}
                </div>
            </div>
@endsection
