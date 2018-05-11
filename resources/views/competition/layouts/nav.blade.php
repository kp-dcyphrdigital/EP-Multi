    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/{{ $competition->slug }}">ENTREZO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item @if ( Request::is($competition->slug) ) active @endif">
              <a class="nav-link" href="/{{ $competition->slug }}">Home</a>
            </li>
            <li class="nav-item @if ( Request::is($competition->slug . '/enter') ) active @endif">
              <a class="nav-link" href="/{{ $competition->slug }}/enter">Enter Now</a>
            </li>
            <li class="nav-item @if ( Request::is($competition->slug . '/faqs') ) active @endif">
              <a class="nav-link" href="/{{ $competition->slug }}/faqs">FAQs</a>
            </li>
            <li class="nav-item @if ( Request::is($competition->slug . '/terms') ) active @endif">
              <a class="nav-link" href="/{{ $competition->slug }}/terms">Terms and Conditions</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main role="main">