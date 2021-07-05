<div>
    @section('title', 'Daftar ' . __('app.citizen'))
    @section('citizen', 'active')
    @include('layouts.page-title', ['page_title' => __('app.citizen')])
    @include('livewire.citizen.alert-validation')

        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="card" style="border-radius: 10px;">
                  <div class="card-header d-flex justify-content-between">
                    <h2>Daftar {{ __('app.citizen') }}</h2>
                    <a class="d-block btn btn-primary" href="{{ url('citizen/create') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah">
                        <span class="fa fa-plus"></span>
                    </a>
                  </div>
                  <div class="card-body border-bottom py-3">
                    {{-- searching --}}
                    <div class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari nama" wire:model.defer="name">
                            <select wire:model.defer="is_active" class="form-control">
                                <option value="">-- Status Aktif --</option>
                                <option value="ya">Aktif</option>
                                <option value="tidak">Tidak Aktif</option>
                            </select>
                            <select wire:model.defer="is_validated" class="form-control">
                                <option value="">-- Status Validasi --</option>
                                <option value="ya">Telah Divalidasi</option>
                                <option value="tidak">Belum Divalidasi</option>
                            </select>
                        </div>
                        <button wire:click="searching" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cari">
                            &nbsp; <span class="fa fa-search"></span> &nbsp;
                        </button>
                    </div>
                  </div>
                  <div class="table-responsive text-nowrap">
                    @if($citizens->isEmpty())
                        <h3 class="d-flex justify-content-center align-items-center p-4">
                            <img loading="lazy" src="{{ asset('assets/images/illustrations/undraw_printing_invoices_5r4r.svg') }}" width="200">
                            <h4 class="text-center">{{ __('app.data_unavailable') }}</h4>
                        </h3>
                    @else
                    <table class="table card-table table-hover table-vcenter table-sm">
                      <thead>
                        <tr>
                          <th class="w-1 text-center">No</th>
                          <th>Nama & NIK</th>
                          <th>Email & Telepon</th>
                          <th>Status Aktif</th>
                          <th>Waktu Validasi</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @php $i = 1 @endphp
                        @foreach ($citizens as $citizen)
                        <tr>
                          <td class="text-center"><span class="text-muted">{{ $i++ }}</span></td>
                          <td>{{ $citizen->full_name }} <br> {{ $citizen->id }}</td>
                          <td>{{ $citizen->user->email }} <br> {{ $citizen->user->phone }} </td>
                          <td>
                              @if($citizen->user->is_active)
                              <span class="text-primary">
                                  <i class="fa fa-check-circle"></i> Aktif
                              </span>
                              @else
                              <span class="text-danger">
                                  <i class="fa fa-ban"></i> Tidak Aktif
                              </span>
                              @endif
                          </td>
                          <td>
                              @if ($citizen->user->validated_at)
                                {{ $citizen->user->validated_at }}
                              @else
                                <span class="text-warning">
                                    <i class="fa fa-hourglass-half"></i> Belum Divalidasi
                                </span>
                              @endif
                          </td>
                          <td class="text-left">
                            <div class="dropdown" x-data="{ open: false }">
                                <ul class="my-2 list-group position-absolute bg-white" style="z-index: 99; top: -10px; right: 100px" x-show.transition.scale="open" @click.away="open = false" >
                                    <a class="list-group-item text-info" href="{{ url('citizen/' . $citizen->id) }}">
                                        <span class="fa fa-info-circle"></span> &nbsp; Detail
                                    </a>

                                    @if (!($citizen->user->validated_at))
                                    <a class="list-group-item text-primary" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal-validation-{{ $citizen->id }}">
                                        <span class="fa fa-check-square"></span> &nbsp; Validasi
                                    </a>
                                    @endif

                                    @if ($citizen->user->is_active)
                                    <a class="list-group-item text-warning" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal-activation-{{ $citizen->id }}">
                                        <span class="fa fa-user-slash"></span> &nbsp; Non Aktifkan
                                    </a>
                                    @else
                                    <a class="list-group-item text-primary" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal-activation-{{ $citizen->id }}">
                                        <span class="fa fa-user"></span> &nbsp; Aktifkan
                                    </a>
                                    @endif

                                    <a class="list-group-item text-success" href="{{ url('citizen/' . $citizen->id . '/edit') }}">
                                        <span class="fa fa-edit"></span> &nbsp; Edit
                                    </a>
                                    <a class="list-group-item text-danger" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $citizen->id }}">
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
                            'title' => $citizen->full_name,
                            'id' => $citizen->id,
                        ])

                        @include('layouts.modal-validation', [
                            'title' => $citizen->full_name,
                            'id' => $citizen->id,
                        ])

                        @include('layouts.modal-activation', [
                            'title' => $citizen->full_name,
                            'is_active' => $citizen->user->is_active,
                            'id' => $citizen->id,
                        ])

                        @endforeach

                      </tbody>
                    </table>
                    @endif
                  </div>
                  <div class="card-footer d-flex justify-content-between pb-0 mb-0" style="border-radius: 10px;">
                    <h4>Total: <strong>{{ number_format($total, 0, ',', '.') }}</strong> </h4>

                    {{ $citizens->onEachSide(1)->links() }}

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

</div>
