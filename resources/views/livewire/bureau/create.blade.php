<div>
  @section('title', 'Tambah ' . __('app.bureau'))
  @section('bureau', 'active')
  @include('layouts.page-title', ['page_title' => __('app.bureau')])

        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="card" style="border-radius: 10px;">
                  <div class="card-header d-flex justify-content-between">
                    <h2>Tambah {{ __('app.bureau') }}</h2>
                    <a class="d-block btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali"
                        @if(url()->previous() === url()->current()) href="{{ url('bureau') }}"
                        @else href="{{ url()->previous() }}" @endif
                    ><span class="fa fa-arrow-left"></span></a>
                  </div>

                  <div class="card-body border-bottom py-3">

                    <form wire:submit.prevent="store" enctype="multipart/form-data">
                        @include('livewire.bureau.form')
                        <div class="form-footer w-100">
                        <button type="submit" class="btn btn-primary btn-block w-100">
                            <span class="fa fa-paper-plane"></span>
                            &nbsp; {{ __('app.save') }}</button>
                        </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

</div>
