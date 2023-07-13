<!DOCTYPE html>
<html>
<head>
    <title>Edit note</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        .form-group .btn {
            width: 100%;
            padding: 10px;
            background-color: blue;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }
        
        .form-group .btn:hover {
            background-color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Note</h2>
        <form id="js_user_create_note">
        @csrf
            <div class="form-group">
                <label for="note">Note</label>
                <textarea  id="note_text" name="note_text" rows="4" cols="50">{{ $note_details->note_text }}</textarea>
                <span class="text-danger">@error('address') {{ $message}} @enderror</span>
                <input type="hidden" id="user_profile_id" name="user_profile_id" value="{{ $note_details->user_profile_id }}">
                <input type="hidden" id="notes_id" name="notes_id" value="{{ $id }}">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="js_note_save">update
            </button>
            </div>
        </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $("#js_user_create_note").submit(function(e){

    e.preventDefault();
    let note_text = $("#note_text").val();
    let user_profile_id = $("#user_profile_id").val();
    let notes_id = $("#notes_id").val();
    let _token = $("input[name=_token]").val();

    $.ajax({

      url:"{{ route('edit-note') }}",
      type:"POST",
      data:{
        note_text:note_text,
        user_profile_id:user_profile_id,
        notes_id:notes_id,
        _token:_token
      },

      success:function(response){
          swal(response.message);
          $("#js_user_create_note")[0].reset();
      }

    });

  });
</script>
</body>
</html>

