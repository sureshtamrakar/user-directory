<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@600&family=Karla&family=Lora&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Karla', sans-serif;
            background-color: #f5f7fb;
        }

        .container {
            max-width: 1200px;
        }

        .form-control-lg {
            font-size: .925rem;
            padding: .4rem 1rem;
        }
    </style>
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <input type="hidden" value="{{url('/')}}" id="url" name="url">

    <main class="d-flex w-100 h-100">
        <div class="container d-flex flex-column">
            @yield('content')
        </div>

    </main>
</body>
</html>