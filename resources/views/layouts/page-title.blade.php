        <div class="container-xl d-none d-lg-block">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Dashboard
                </div>
                <h2 class="page-title">
                  {{ $page_title ?? 'Beranda' }}
                </h2>
              </div>
              <!-- notif & user -->
              <div class="col-auto ms-auto">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
							<div class="nav-item dropdown d-none d-md-flex me-3">
								<a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1">
									<span class="fa fa-bell fa-lg"></span>
									<span class="badge bg-red"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
									<div class="card">
										<div class="card-body">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem
											fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime
											necessitatibus ullam.
										</div>
										</div>
								</div>
							</div>
                  </span>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
								<span class="avatar avatar-sm" style="background-image: url({{ asset('assets/images/avatar-male.png') }})"></span>
								<div class="d-none d-xl-block ps-2">
									<div>Cristiano Ronaldo</div>
									<div class="mt-1 small text-muted">Admin</div>
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

              </div>
            </div>
          </div>
        </div>

        @if(session()->has('message'))
        <div class="container-xl my-2">
            <div class="alert alert-important alert-primary alert-dismissible" role="alert">
                <div class="d-flex">
                    <div><span class="fa fa-info-circle fa-lg"></span> &nbsp;</div>
                    <div>{{ session('message') }}</div>
                </div>
                <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        </div>
        @endif
