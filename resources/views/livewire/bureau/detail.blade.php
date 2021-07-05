<div>
    @section('title', 'Detail ' . __('app.bureau'))
    @section('bureau', 'active')
    @include('layouts.page-title', ['page_title' => __('app.bureau')])

        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-12">
                <div class="card" style="border-radius: 10px;">
                  <div class="card-header d-flex justify-content-between">
                    <h2>Detail {{ __('app.bureau') }}</h2>
                    <div>
                        <a class="d-inline-block btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali"
                            @if(url()->previous() === url()->current()) href="{{ url('bureau') }}"
                            @else href="{{ url()->previous() }}" @endif
                        ><span class="fa fa-arrow-left"></span></a>
                        <div class="dropdown d-inline-block" x-data="{ open: false }">
                            <ul class="my-2 list-group position-absolute bg-white" style="z-index: 99; top: -10px; left: -110px;" x-show.transition.scale="open" @click.away="open = false" >
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
                    </div>
                  </div>
                  <div class="card-body border-bottom py-3">
                    <dl>
                        <dt>Nama Lengkap</dt>
                        <dd>{{ $bureau->name }} ({{ $bureau->short_name }})</dd>

                        <dt>Email</dt>
                        <dd>{{ $bureau->email ?? '-' }}</dd>

                        <dt>Telepon</dt>
                        <dd>{{ $bureau->phone ?? '-' }}</dd>

                        <dt>Alamat</dt>
                        <dd>{{ $bureau->address ?? '-' }}</dd>

                        <dt>Logo</dt>
                        <dd>
                            @if(isset($bureau->file))
                                <img src="{{ Storage::url($bureau->file->path) }}" class="img-fluid w-50 shadow rounded">
                                <br>
                                <span class="text-muted">
                                    {{ $bureau->file->original_name }} ({{ round($bureau->file->size / 1024) }} kb)
                                </span>
                            @else
                                -
                            @endif
                        </dd>

                        <dt>Waktu Dibuat</dt>
                        <dd>{{ $bureau->created_at }}</dd>

                        <dt>Terakhir Update</dt>
                        <dd>{{ $bureau->updated_at }}</dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('layouts.modal-delete', [
            'title' => $bureau->name,
            'id' => $bureau->id,
        ])

</div>
