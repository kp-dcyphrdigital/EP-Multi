              <table class="table">
                <thead>
                  <tr>
                    @if ( Request::is('admin/entries') )
                    <th scope="col"><a href="/admin/entries">ID</a></th>
                    <th scope="col"><a href="/admin/entries?sort=firstname">Name</a></th>
                    @else
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    @endif
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Approved</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($entries as $entry)
                  <tr>
                    <th scope="row">{{ $entry->id }}</th>
                    <td>{{ $entry->firstname }} {{ $entry->lastname }}</td>
                    <td>{{ $entry->email }}</td>
                    <td>{{ $entry->telephone }}</td>
                    <td>
                      @if ($entry->approved === 1)
                      <div style="font-size:1em; color:Green">
                        <i class="fas fa-check-circle"></i>
                      </div>
                      @endif
                    </td>
                    <td><a href="/admin/entries/{{ $entry->id }}">View</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>