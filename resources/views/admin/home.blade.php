@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('admin.partials.dashboard')
            <h3>Pending Approvals</h3>
  
            @if ( count($entries) === 0 )

              <div class="alert alert-success" role="alert">
                No pending approvals!
              </div>            

            @else

            	@include('admin.partials.todo')

            @endif
            
        </div>
    </div>
</div>
@endsection
