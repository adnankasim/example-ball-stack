@include('layouts.head')

  <body class="">
    <div class="page">
      <div class="page-main">
        <!-- header -->
        <div class="header py-4">
          <div class="container">
            <div class="d-flex align-items-center">
              <a class="header-brand" href="./index.html">
                <img src="{{ asset('assets/images/ok-kubar/kubar-ok-logo.png') }}" class="header-brand-img" alt="Logo OK Kubar">
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url({{ asset('demo/faces/male/41.jpg') }})"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url({{ asset('demo/faces/female/1.jpg') }})"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url({{ asset('demo/faces/female/18.jpg') }})"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="notifikasi.html" class="dropdown-item text-center text-muted-dark">Lihat semua notifikasi</a>
                  </div>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{ asset('demo/faces/female/25.jpg') }})"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">Jane Pearson</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <!-- navbar -->
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="./menejemen-user.html" class="nav-link"><i class="fe fe-user"></i> Menejemen Pengguna</a>
                  </li>
                  <li class="nav-item">
                    <a href="./layanan.html" class="nav-link"><i class="fe fe-phone"></i> Layanan</a>
                  </li>
                  <li class="nav-item">
                    <a href="./menejemen-instansi.html" class="nav-link"><i class="fe fe-briefcase"></i> Menejemen Instansi</a>
                  </li>
                  <li class="nav-item">
                    <a href="./validasi-user.html" class="nav-link"><i class="fe fe-briefcase"></i> Validasi User</a>
                  </li>
                  <li class="nav-item">
                    <a href="./jenis-berkas.html" class="nav-link"><i class="fe fe-folder"></i> Jenis Berkas</a>
                  </li>
                  <li class="nav-item">
                    <a href="./prosedur-layanan.html" class="nav-link"><i class="fe fe-phone-call"></i> Prosedur Layanan</a>
                  </li>
                  <li class="nav-item">
                    <a href="./laporan.html" class="nav-link"><i class="fe fe-clipboard"></i> Laporan</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end-of-navbar -->
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div>
            <div class="row row-cards">
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      In
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">43</div>
                    <div class="text-muted mb-4">Layanan Masuk</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      Out
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">17</div>
                    <div class="text-muted mb-4">Layanan Selesai</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      Canceled
                      <i class="fe fe-x-circle"></i>
                    </div>
                    <div class="h1 m-0">7</div>
                    <div class="text-muted mb-4">Layanan Dibatalkan</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-yellow">
                      Waiting
                      <i class="fe fe-info"></i>
                    </div>
                    <div class="h1 m-0">27.3K</div>
                    <div class="text-muted mb-4">Waktu Tunggu</div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Notification</h3>
                  </div>
                  <div class="card-body">
                    <i>Put your charts here.</i>
                  </div>
                </div> <!-- end-of-card -->
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Jumlah Pengajuan Layanan</h3>
                  </div>
                  <!-- table-responsive -->
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th class="w-50">Information</th>
                          <th>Time</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="text-muted">1</span></td>
                          <td><a href="invoice.html" class="text-inherit">User App Dengan Email aruelcarora385@gmail.com dan No. HP +62082218996544 Selesai Melengkapi Profile</a></td>
                          <td>
                            17:31
                          </td>
                          <td>
                            <span class="text-green">Read</span>
                          </td>
                          <td class="text-right">
                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm">Delete</a>
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm">Detail</a>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="text-muted">1</span></td>
                          <td><a href="invoice.html" class="text-inherit">User App Dengan Email aruelcarora385@gmail.com dan No. HP +62082218996544 Selesai Melengkapi Profile</a></td>
                          <td>
                            17:31
                          </td>
                          <td>
                            <span class="text-green">Read</span>
                          </td>
                          <td class="text-right">
                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm">Delete</a>
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm">Detail</a>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="text-muted">1</span></td>
                          <td><a href="invoice.html" class="text-inherit">User App Dengan Email aruelcarora385@gmail.com dan No. HP +62082218996544 Selesai Melengkapi Profile</a></td>
                          <td>
                            17:31
                          </td>
                          <td>
                            <span class="text-green">Read</span>
                          </td>
                          <td class="text-right">
                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm">Delete</a>
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm">Detail</a>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="text-muted">1</span></td>
                          <td><a href="invoice.html" class="text-inherit">User App Dengan Email aruelcarora385@gmail.com dan No. HP +62082218996544 Selesai Melengkapi Profile</a></td>
                          <td>
                            17:31
                          </td>
                          <td>
                            <span class="text-green">Read</span>
                          </td>
                          <td class="text-right">
                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-sm">Delete</a>
                            <a href="javascript:void(0)" class="btn btn-warning btn-sm">Detail</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- end-of-table-responsive -->
                  <div class="card-body">
                    <a href="/notification.html" class="mt-5 float-right btn btn-primary">See more notification</a>
                  </div>
                </div> <!-- end-of-card -->
              </div>
            </div>
          </div>
        </div>
      </div>

      @include('layouts.footer')
