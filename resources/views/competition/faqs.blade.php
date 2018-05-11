@extends('competition.layouts.master')
@section('content')
            <div class="container p-3">
                <h1>
                    FAQs
                </h1>
                @foreach ($faqs as $faq)
					<div class="card">
					  <div class="card-header bg-warning">
					    {{ $faq->question }}
					  </div>
					  <div class="card-body">
					    <p class="card-text">{{ $faq->answer }}</p>
					  </div>
					</div>
                @endforeach
            </div>
@endsection
