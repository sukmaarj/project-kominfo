<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kominfo | Dashboard</title>
    <link href="/img/logo.png" rel="icon">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    
    <!-- Bootstrap core CSS -->
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-pzjw8wK1C8R8JlksFh0p1CAZapz9UqflCvO+YjSN/R5HyqKvL2Lb7jix3ryqjNHs" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>


    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    
</head>
<body>
    
@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
    @include('dashboard.layouts.sidebar')

    <main class="col-12 col-md-9 col-lg-10 px-md-4">
        <!-- bagian main akan disimpan di tiap-tiap halaman yang mau menggunakan layout ini -->
        @yield('container')
    </main>

  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  

    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    
    <script src="https://unpkg.com/feather-icons"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
    <script src="/js/dashboard.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="collapse"]').click(function() {
            $($(this).data('target')).toggleClass('show');
        });
    });
</script>
  </body>
</html>
