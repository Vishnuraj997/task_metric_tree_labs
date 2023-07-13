<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    
    <div class="container">
        <h2>Registration</h2>
        <form action="{{ route('register-user') }}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" value="{{old('firstname')}}">
            
            </div>
            <div class="form-group">
                <label for="lastname">Last name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter your Last name" value="{{old('lastname')}}">
               
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}">
               
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" >
               
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea  id="address" name="address" placeholder="Enter your Address" rows="4" cols="50"></textarea>
    
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary" id="js_user_save">Save
                                Changes</button>            
            </div>
        </form>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
