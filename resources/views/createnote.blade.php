<!DOCTYPE html>
<html>
<head>
    <title>note Page</title>
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
            background-color: #4caf50;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
        }
        
        .form-group .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Note</h2>
        <form id="js_user_create_note">
        @csrf
            <div class="form-group">
                <label for="note">Note</label>
                <textarea  id="note" name="note" rows="4" cols="50"></textarea>
                <span class="text-danger">@error('address') {{ $message}} @enderror</span>
                <input type="hidden" id="user_profile_id" name="user_profile_id" value="{{ $user_profile_id }}">
                <input type="hidden" id="user_id" name="user_id" value="{{ $id }}">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="js_note_save">create
            </button>
            </div>
        </form>
    </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $("#js_user_create_note").submit(function(e){

    e.preventDefault();
    let note_text = $("#note").val();
    let user_profile_id = $("#user_profile_id").val();
    let user_id = $("#user_id").val();
    // var returnUrl = "{{ route('home') }}";
    let _token = $("input[name=_token]").val();

    $.ajax({

      url:"{{ route('create-note') }}",
      type:"POST",
      data:{
        note_text:note_text,
        user_profile_id:user_profile_id,
        user_id:user_id,
        _token:_token
      },

      success:function(response){
          swal(response.message);
          window.location.href = returnUrl;
          $("#js_user_create_note")[0].reset();
      }

    });

  });
</script>
</body>
</html>

