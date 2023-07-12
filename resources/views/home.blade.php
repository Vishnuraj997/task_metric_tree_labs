<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="row">
       
        <div class="col-3">
            <a class="btn btn-success" id="create" href="{{ route('create',$user_id)}}">Create Note</a>
        </div>
        <div class="col-3">
            <form action="{{ route('logout') }}" method="post">
                @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>
    <div class="col-md-12">
                        <h2>My notes</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table>
                        <tr>
                        <th>Notes</th>
                         <th width="280px">Action</th>
                         </tr>
                         @if($mynotes)
                         @foreach($mynotes as $note_text)
                         <tr>
                         <td>{{ $note_text->note_text }}</td>
                          <td>
                            <form action="{{route('delete',$note_text->id)}}" method="post">
                                <a class="btn btn-primary" href="{{ route('edit',$note_text->id) }}">edit</a> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                               
                            </form>
                        </td>
                         </tr>
                         @endforeach
                         @endif
                          </table>
                    </div>
             </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="{{ asset('js/debounce.js') }}?v=2"></script>
<script src="{{ asset('js/pages/users/index.js') }}?v=5"></script>
</html>
