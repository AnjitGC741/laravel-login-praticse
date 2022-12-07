<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="dflex justify-content-center w-50 border p-3">
            <form>
                @csrf
                <label>Email</label>
                <input type="email" name="email" class="form-control">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <button class="btn btn-success m-2">Submit</button>
            </form>
           <a href="{{route('google-auth')}}"><button class="btn btn-primary">Log in with google</button></a> 
    </div>
</body>
</html>