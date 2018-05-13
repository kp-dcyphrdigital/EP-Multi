<form method="get">
  <div class="form-row align-items-center">

    <div class="col-sm-3 my-1">
      <select class="form-control" id="competition" name="competition">
        <option value="">All my competitions</option>
        @foreach ($competitions as $competition)
        <option value="{{ $competition->id }}" @if ( request('competition') == $competition->id ) selected @endif>{{ $competition->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="col-auto my-1">

      <select class="form-control" id="approved" name="approved">
        <option value="">All statuses</option>
        <option value="0" @if ( request('approved') === '0' ) selected @endif>Unapproved Entries</option>
        <option value="1" @if ( request('approved') === '1' ) selected @endif>Approved Entries</option>
      </select>

    </div>

    <div class="col-auto my-1">
      <label class="sr-only" for="q">Name</label>
      <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}">
    </div>

    <div class="col-auto my-1">
      <button type="submit" class="btn btn-sm btn-info">Search</button>
    </div>

    <div class="col-auto my-1">
      <a href="/admin/entries/csv?competition={{ request('competition') }}&approved={{ request('approved') }}&q={{ request('q') }}">Download as CSV</a>
    </div>
 
  </div>
</form>