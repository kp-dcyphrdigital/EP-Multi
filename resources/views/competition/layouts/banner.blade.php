      <section class="jumbotron text-center" style="background-image: url('{{ asset('storage/images/' . $competition->banner )}}');">
        <div class="container">
          <h1 class="jumbotron-heading">{{ $competition->name }}</h1>
          <p class="lead">{{ $competition->cta }}</p>
          <p>
            <a href="#" class="btn btn-lg btn-info my-2">Enter Now</a>
          </p>
        </div>
      </section>