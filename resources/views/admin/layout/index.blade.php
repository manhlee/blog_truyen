<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('public/fontawesome.1-web/css/all.min.css')}}">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- ckeditor -->
<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- <link rel="stylesheet" type="text/css" href="../truyen.css"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="{{asset('public/public_admin/css/css.css')}}">

  <title>Admin</title>
 <base href="{{asset('')}}">
</head>
<body>
  
  </div>
     @include("admin.layout.header")  
     @include('admin.layout.navbar')
      <!-- end header -->
@yield('content')
</div> <!-- end chuyenmuc -->
</div>
</div>
</div>
<script type="text/javascript" src="{{asset('public/public_admin/js/js.js')}}"></script>
@yield('script')
</body>
</html>