<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <link rel="stylesheet" type="text/css" href="{{asset('public_admin/css/css_login.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <div class="container-fluid row">
      <div class="col-md-4"></div>
      <div class="col-md-4 formdn">
        <h3 class="text-center text-white">ADMIN</h3>
        <form method="post" action="{{route('post_login')}}">
          <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
          </div>
          <div class="form-group">
            <label class="pass">Password</label>
            <input type="Password" name="pass" id="pass" class="form-control">
            <small>
              @if(session('thatbai'))
                {{session('thatbai')}}
              @endif
            </small>
          </div>
          <button class="btn btn-success float-right" type="submit">Login</button>
         
        </form>

      </div>
      <div class="col-md-4"></div>
    </div>
   
  </body>
</html>