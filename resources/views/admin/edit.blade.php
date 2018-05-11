@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<h3>{{ $entry->firstname }} {{ $entry->lastname }}</h3>
        	<p><em>{{ $entry->created_at->diffForHumans() }}</em></p>
        	<img src="{{ asset( '/images/' . $entry->url ) }}">
	          <form class="mt-3" method="post" action="/admin/entries/{{ $entry->id }}">
	            @csrf
	            @method('PATCH')
	            <div class="form-group">
	              @if (!$entry->approved)
	                <button type="submit" class="btn btn-success">Approve</button>
	              @else
	                <button type="submit" class="btn btn-danger">Unapprove</button>
	              @endif
	            </div>
	          </form>       	
        </div>
    </div>
</div>
@endsection