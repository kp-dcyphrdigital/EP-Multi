@extends('competition.layouts.master')

@section('head')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
            <div class="container p-3">
                <h1>
                    Enter Now
                </h1>

                <div>

                  <form method="post" action="/{{ $competition->slug }}/enter" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="form-group">
                      <label for="firstname">First Name</label>
                      @if ( ! $errors->has('firstname') )
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ old('firstname') }}">
                      @else
                        <input type="text" class="form-control is-invalid" id="firstname" name="firstname" value="{{ old('firstname') }}">
                        <div class="invalid-feedback">Please enter your First Namw</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="lastname">Last Name</label>
                      @if ( ! $errors->has('lastname') )
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ old('lastname') }}">
                      @else
                        <input type="text" class="form-control is-invalid" id="lastname" name="lastname" value="{{ old('lastname') }}">
                        <div class="invalid-feedback">Please enter your Last Name</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="email">Email address</label>
                      @if ( ! $errors->has('email') )
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                      @else
                        <input type="email" class="form-control is-invalid" id="email" name="email" value="{{ old('email') }}">
                        <div class="invalid-feedback">Please enter a valid email address</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="telephone">Telephone</label>
                      @if ( ! $errors->has('telephone') )
                        <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="10 digit contact number e.g. 04XXXXXXXX or 02XXXXXXXX" value="{{ old('telephone') }}">
                      @else
                        <input type="tel" class="form-control is-invalid" id="telephone" name="telephone" placeholder="10 digit contact number e.g. 04XXXXXXXX or 02XXXXXXXX" value="{{ old('telephone') }}">
                        <div class="invalid-feedback">Please enter a valid 10 digit phone / mobile number</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="photo">Upload your photo</label>
                      @if ( ! $errors->has('photo') )
                        <input type="file" class="form-control-file" id="photo" name="photo">
                      @else
                        <input type="file" class="form-control is-invalid" id="photo" name="photo">
                        <div class="invalid-feedback">Please upload an image and ensure it is a maximum of 200 KB</div>                        
                      @endif
                    </div>

                    <div class="form-group form-check">
                      @if ( ! $errors->has('optin') )
                        <input type="checkbox" class="form-check-input" id="optin" name="optin">
                        <label class="form-check-label" for="optin">I agree to the <a href="/{{ $competition->slug }}/terms">terms and conditions.</a></label>
                      @else
                        <input type="checkbox" class="form-check-input is-invalid" id="optin" name="optin">
                        <label class="form-check-label" for="optin">I agree to the <a href="/{{ $competition->slug }}/terms">terms and conditions.</a></label>
                        <div class="invalid-feedback">You must agree to the terms and conditions</div>
                      @endif
                    </div>

                    <div class="form-group">
                      <div class="g-recaptcha" data-sitekey="6LdoZ1MUAAAAABeYf0tbVhAAGYSmvTnPjXXFJm0y"></div>
                      @if ( $errors->has('g-recaptcha-response') )
                        <div class="invalid-feedback">The recaptcha verification failed. Try again.</div>
                      @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>

                </div>
            </div>
@endsection
