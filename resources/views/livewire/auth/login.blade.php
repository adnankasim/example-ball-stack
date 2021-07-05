<div>
      <body class="">
    <div class="page" style="height: 100vh">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="{{ asset('assets/images/ok-kubar/kubar-ok-logo.png') }}" class="h-9" alt="Logo OK Kubar">
              </div>
              <form class="card" style="border-radius: 10px;" action="" method="post">
                <div class="card-body p-4">
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                    </label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                      <span class="fa fa-sign-in"></span> Log In
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>

  </body>
</html>
</div>
