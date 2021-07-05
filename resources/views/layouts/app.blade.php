<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <title>@yield('title', 'Dashboard') | Kubar OK</title>
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <link href="{{ asset('assets/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-flags.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-payments.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/tabler-vendors.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet"/>

    <link rel="icon" type="image/svg" href="{{ asset('assets/images/ok-kubar/kubar-ok-logo.png') }}">

    <script src="{{ mix('js/app.js') }}" defer data-turbolinks-track="reload"></script>

    @livewireStyles

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

  </head>

  <body class="antialiased">
    <div class="wrapper">

      <aside class="navbar navbar-vertical navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
              <img loading="lazy" src="{{ asset('assets/images/ok-kubar/kubar-ok-logo.png') }}" width="75" title="Logo Kubar OK" alt="Logo Kubar OK">
            </a>
          </h1>
          <div class="navbar-nav flex-row d-lg-none">
			<div class="nav-item dropdown d-flex me-3">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1">
                    <span class="fa fa-bell fa-lg"></span>
                    <span class="badge bg-red"></span>
                </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url({{ asset('assets/images/avatar-male.png') }})"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Paweł Kuna</div>
                  <div class="mt-1 small text-muted">UI Designer</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Set status</a>
                <a href="#" class="dropdown-item">Profile & account</a>
                <a href="#" class="dropdown-item">Feedback</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item">Logout</a>
              </div>
            </div>

          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
              {{-- beranda nav --}}
              <li class="nav-item @yield('beranda')">
                <a class="nav-link" href="./index.html" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <span class="fa fa-home"></span>
                  </span>
                  <span class="nav-link-title">
                    Beranda
                  </span>
                </a>
              </li>

              {{-- bureau --}}
              <li class="nav-item @yield('bureau')">
                <a class="nav-link" href="{{ url('bureau') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <span class="fa fa-building"></span>
                  </span>
                  <span class="nav-link-title">
                    {{ __('app.bureau') }}
                  </span>
                </a>
              </li>

              {{-- citizen --}}
              <li class="nav-item @yield('citizen')">
                <a class="nav-link" href="{{ url('citizen') }}" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                      <span class="fa fa-users"></span>
                  </span>
                  <span class="nav-link-title">
                    {{ __('app.citizen') }}
                  </span>
                </a>
              </li>

              <li class="nav-item @yield('file')">
                <div x-data="{ file: false }">
                    <a class="nav-link dropdown-toggle" @click="file = true" style="cursor: pointer">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <span class="fa fa-file-alt"></span>
                        </span>
                        <span class="nav-link-title">
                            File
                        </span>
                    </a>
                    <ul class="my-1 list-group" x-show.transition.scale="file" @click.away="file = false">
                        <a class="list-group-item text-dark" href="{{ url('file/logo') }}">Logo {{ __('app.bureau') }} </a>
                        <a class="list-group-item text-dark" href="#">KTP {{ __('app.citizen') }} </a>
                        <a class="list-group-item text-dark" href="#">Foto {{ __('app.citizen') }} </a>
                        <a class="list-group-item text-dark" href="#">Foto w/ KTP {{ __('app.citizen') }} </a>
                    </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </aside>


      <div class="page-wrapper">

    {{ $slot }}

@include('layouts.footer')
