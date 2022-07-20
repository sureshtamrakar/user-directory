<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
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
        <div id="media-modal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header py-1">
                        Media Manager
                    </div>
                    <div class="modal-body">
                        <div class="media-image-manager">
                            <!-- nav tabs -->
                            <form enctype="multipart/form-data" class="dropzone" id="image-upload" action="{{ route('media.store') }}">
                                @csrf
                            </form>
                            <button class="btn btn-square btn-primary mt-2" id="uploadFile">Upload Files</button>
                        </div>
                    </div><!-- end .modal-content -->
                </div>
            </div><!-- end .modal-dialog -->
        </div><!-- end .modal -->
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('js/state.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>