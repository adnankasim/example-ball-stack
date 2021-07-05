<div>
    @section('title', 'Detail ' . __('app.citizen'))
    @section('citizen', 'active')
    @include('layouts.page-title', ['page_title' => __('app.citizen')])
    @include('livewire.citizen.alert-validation')

        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="card" style="border-radius: 10px;">
                  <div class="card-header d-flex justify-content-between">
                    <h2>Detail {{ __('app.citizen') }}</h2>
                    <div>
                        <a class="d-inline-block btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali" @if(url()->previous() === url()->current()) href="{{ url('citizen') }}" @else href="{{ url()->previous() }}" @endif >
                            <span class="fa fa-arrow-left"></span>
                        </a>
                        <div class="dropdown d-inline-block" x-data="{ open: false }">
                            <ul class="my-2 list-group position-absolute bg-white" style="z-index: 99; top: -10px; left: -110px;" x-show.transition.scale="open" @click.away="open = false" >
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
                    </div>
                  </div>
                  <div class="card-body border-bottom py-3">
                    <dl>
                        <dt>Nama</dt>
                        <dd>{{ $citizen->full_name }}</dd>

                        <dt>NIK</dt>
                        <dd>{{ $citizen->id }}</dd>

                        <dt>No. KK</dt>
                        <dd>{{ $citizen->kk_number }}</dd>

                        <dt>Tempat & Tanggal Lahir</dt>
                        <dd>{{ $citizen->birth_place ?? '-' }}, {{ $citizen->birth_date ? \Carbon\Carbon::create($citizen->birth_date)->format('d-m-Y') : '-' }}</dd>

                        <dt>Jenis Kelamin</dt>
                        <dd>{{ ($citizen->sex === 'f') ? 'Perempuan' : 'Laki-Laki' }}</dd>

                        <dt>Kewarganegaraan</dt>
                        <dd>{{ ($citizen->citizenship === 'wni') ? 'WNI' : 'WNA' }}</dd>

                        <dt>Email</dt>
                        <dd>{{ $citizen->user->email }}</dd>

                        <dt>Telepon</dt>
                        <dd>{{ $citizen->user->phone ?? '-' }}</dd>

                        <dt>Status Aktif</dt>
                        <dd>
                            @if($citizen->user->is_active)
                              <span class="text-primary">
                                  <i class="fa fa-check-circle"></i> Aktif
                              </span>
                              @else
                              <span class="text-danger">
                                  <i class="fa fa-ban"></i> Tidak Aktif
                              </span>
                            @endif
                        </dd>

                        <dt>Waktu Validasi</dt>
                        <dd>
                            @if ($citizen->user->validated_at)
                                {{ $citizen->user->validated_at }}
                            @else
                                <span class="text-warning">
                                    <i class="fa fa-hourglass-half"></i> Belum Divalidasi
                                </span>
                            @endif
                        </dd>

                        <dt>Foto</dt>
                        <dd>
                            @if(isset($photo))
                                <img src="{{ Storage::url($photo->path) }}" class="img-fluid w-50 shadow rounded">
                                <br>
                                <span class="text-muted">
                                    {{ $photo->original_name }} ({{ round($photo->size / 1024) }} kb)
                                </span>
                            @else
                                -
                            @endif
                        </dd>

                        <dt>KTP</dt>
                        <dd>
                            @if(isset($ktp))
                                <img src="{{ Storage::url($ktp->path) }}" class="img-fluid w-50 shadow rounded">
                                <br>
                                <span class="text-muted">
                                    {{ $ktp->original_name }} ({{ round($ktp->size / 1024) }} kb)
                                </span>
                            @else
                                -
                            @endif
                        </dd>

                        <dt>Foto dengan KTP</dt>
                        <dd>
                            @if(isset($photo_with_ktp))
                                <img src="{{ Storage::url($photo_with_ktp->path) }}" class="img-fluid w-50 shadow rounded">
                                <br>
                                <span class="text-muted">
                                    {{ $photo_with_ktp->original_name }} ({{ round($photo_with_ktp->size / 1024) }} kb)
                                </span>
                            @else
                                -
                            @endif
                        </dd>

                        <dt>Waktu Dibuat</dt>
                        <dd>{{ $citizen->created_at }}</dd>

                        <dt>Terakhir Update</dt>
                        <dd>{{ $citizen->updated_at }}</dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

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

</div>
