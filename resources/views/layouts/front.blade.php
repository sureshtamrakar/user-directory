<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@600&family=Karla&family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/admin_asset/css/style.css')}}">
    <title>User Dashboard</title>
</head>
<body>
    <input type="hidden" value="{{url('/')}}" id="url" name="url">

    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar d-none d-lg-block">
            <div class="sidebar-content js-simplebar" data-simplebar="init">
                <div class="simplebar-wrapper w-100" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper w-100" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <a class="sidebar-brand" href="index.html">
                                        <span class="sidebar-brand-text align-middle">
                                            Dashboard
                                        </span>
                                    </a>
                                    <div class="sidebar-user">
                                        <div class="d-flex pl-4">
                                            <div class="flex-shrink-0">
                                                {!!get_attachment(Auth::user()->image)!!}

                                            </div>
                                            <div class="flex-grow-1 py-3 pl-1">
                                                <span class="sidebar-user-title">
                                                    {{Auth::user()->name}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <ul class="sidebar-nav">
                                        <li class="sidebar-item">
                                            <a class="sidebar-link text-light" href="{{ route('profile.view') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-middle">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                                <span class="align-middle pl-3">Profile</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a class="sidebar-link text-light" href="{{ route('profile.edit') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square align-middle">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                </svg>
                                                <span class="align-middle pl-3">Edit</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Account
                            </a>
                            <div class="dropdown-menu" style="left: auto;right: 0;" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    Logout
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
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
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="{{ asset('js/state.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>