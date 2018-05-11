           <h3>Active Competitions</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Competition Name</th>
                  <th scope="col">Total Entries</th>
                  <th scope="col">Approved Entries</th>
                  <th scope="col">Unapproved Entries</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($competitions as $competition)
                <tr>
                  <th scope="row">{{ $competition->name }}</th>
                  <td>{{ $competition->entries_count }}</td>
                  <td>{{ $competition->approved_entries_count }}</td>
                  <td>{{ $competition->unapproved_entries_count }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
