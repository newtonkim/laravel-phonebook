<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contacts</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    var path = "{{ url('search') }}";
    $('#search').typeahead({
         minLength: 2,
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>     
  </head>
  <body>
    <div class="container">
      <h2Laravel Typeahead Search Tutorial With Example></h2Laravel><br/>
      @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Search">Search:</label>
            <input type="text" class="form-control" id="search" name="search">
          </div>
        </div>
    </div>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Date</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($contacts as $contact)
      @php
        $date=date('Y-m-d', $contact['date']);
        @endphp
      <tr>
        <td>{{$contact['id']}}</td>
        <td>{{$contact['name']}}</td>
        <td>{{$contact['number']}}</td>
        <td>{{$contact['email']}}</td>
        <td>{{$date}}</td>
                                
        <td><a href="{{action('ContactController@edit', $contact['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('ContactController@destroy', $contact['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>

