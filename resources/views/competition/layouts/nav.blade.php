    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand text-light" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link text-light" href="/{{ $competition->slug }}">About the Competition<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/{{ $competition->slug }}/enter">Enter Now</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/{{ $competition->slug }}/faqs">FAQs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/{{ $competition->slug }}/terms">Terms and Conditions</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <main role="main">