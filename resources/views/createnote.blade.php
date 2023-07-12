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
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" id="js_note_save">create
                                </button>
            </div>
        </form>
    </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
    $(document).ready(function()
    {
        $("#js_user_create_note").submit(function(event){
            event.preventDefault();
            headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            var form =$("#js_user_create_note")[0];
            var data =new FormData(form);

            $("#js_note_save").prop("disabled",true);

            $.ajax({
            
                url:"{{ route('create-note') }}",
                // headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                data: $("#js_user_create_note").serialize(),
                type:"POST",
                processData:false,
                contentType:false,
                success:function(data){
                    $("#output").text(data.res);
                    $("#js_note_save").prop("disabled",false);
                },
                error:function(e){
                    $("#output").text(e.responseText);
                    $("#js_note_save").prop("disabled",false);
                }

            });
        });
    });
</script>

</body>
</html>

