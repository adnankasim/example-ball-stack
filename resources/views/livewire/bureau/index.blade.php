<div>
    @section('title', 'Daftar ' . __('app.bureau'))
    @section('bureau', 'active')
    @include('layouts.page-title', ['page_title' => __('app.bureau')])

        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="card" style="border-radius: 10px;">
                  <div class="card-header d-flex justify-content-between">
                    <h2>Daftar {{ __('app.bureau') }}</h2>
                    <a class="d-block btn btn-primary" href="{{ url('bureau/create') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah">
                        <span class="fa fa-plus"></span>
                    </a>
                  </div>
                  <div class="card-body border-bottom py-3">
                    {{-- searching --}}
                    <div class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari nama" wire:model.defer="search">
                        </div>
                        <button wire:click="searching" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari">
                            &nbsp; <span class="fa fa-search"></span> &nbsp;
                        </button>
                    </div>
                  </div>
                  <div class="table-responsive text-nowrap">
                    @if($bureaus->isEmpty())
                        <h3 class="d-flex justify-content-center align-items-center p-4">
                            <img loading="lazy" src="{{ asset('assets/images/illustrations/undraw_printing_invoices_5r4r.svg') }}" width="200">
                            <h4 class="text-center">{{ __('app.data_unavailable') }}</h4>
                        </h3>
                    @else
                    <table class="table card-table table-vcenter table-hover table-sm">
                      <thead>
                        <tr>
                          <th class="w-1 text-center">No</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>Telepon</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1 @endphp
                        @foreach ($bureaus as $bureau)
                        <tr>
                          <td class="text-center"><span class="text-muted">{{ $i++ }}</span></td>
                          <td>{{ $bureau->name }} ({{ $bureau->short_name }})</td>
                          <td>{{ $bureau->email ?? '-' }}</td>
                          <td>{{ $bureau->phone ?? '-' }}</td>
                          <td class="text-left">
                            <div class="dropdown" x-data="{ open: false }">
                                <ul class="my-2 list-group position-absolute bg-white" style="z-index: 99; top: -10px; left: -110px;" x-show.transition.scale="open" @click.away="open = false" >
                                    <a class="list-group-item text-info" href="{{ url('bureau/' . $bureau->id) }}">
                                        <span class="fa fa-info-circle"></span> &nbsp; Detail
                                    </a>
                                    <a class="list-group-item text-success" href="{{ url('bureau/' . $bureau->id . '/edit') }}">
                                        <span class="fa fa-edit"></span> &nbsp; Edit
                                    </a>
                                    <a class="list-group-item text-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $bureau->id }}" class="btn btn-outline-danger">
                                        <span class="fa fa-trash"></span> &nbsp; Hapus
                                    </a>
                                </ul>
                                <button data-bs-toggle="tooltip" data-bs-placement="top" title="Aksi" class="btn" @click="open = true">
                                    <span class="fa fa-cog"></span>
                                </button>
                            </div>
                          </td>
                        </tr>

                        @include('layouts.modal-delete', [
                            'title' => $bureau->name,
                            'id' => $bureau->id,
                        ])

                        @endforeach

                      </tbody>
                    </table>
                    @endif
                  </div>
                  <div class="card-footer d-flex justify-content-between pb-0 mb-0" style="border-radius: 10px;">
                    <h4>Total: <strong>{{ number_format($total, 0, ',', '.') }}</strong> </h4>

                    {{ $bureaus->onEachSide(1)->links() }}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

</div>
