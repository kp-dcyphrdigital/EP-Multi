<form method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="q">Name</label>
      <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}">
    </div>
    <div class="col-auto my-1">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="approved" name="approved" value="1" @if ( request('approved') == 1) checked @endif>
        <label class="form-check-label" for="autoSizingCheck2">
          Approved
        </label>
      </div>
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-sm btn-info">Search</button>
    </div>
  </div>
</form>