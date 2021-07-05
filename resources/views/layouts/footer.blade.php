        <footer class="footer footer-transparent text-right d-flex justify-content-end">
            <div class="container-fluid">
            <div class="row text-right align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline  list-inline-dots mb-0 text-right">
                  <li class="list-inline-item ">
                    Copyright &copy; {{ date('Y') }} <strong>Kubar OK</strong>. All rights reserved.
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js') }}"></script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>

  </body>
</html>
