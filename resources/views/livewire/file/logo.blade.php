<div>
    @section('title', 'Daftar ' . 'Logo ' . __('app.bureau'))
    @section('file', 'active')
    @include('layouts.page-title', ['page_title' => 'Logo ' . __('app.bureau')])

    <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">

            @forelse ($logos as $logo)
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div style="overflow: scroll; width: 100%; height: 200px">
                            <img loading="lazy" src="{{ Storage::url($logo->path) }}" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                            <div class="">
                                <div><strong>{{ $logo->fileable->name }}</strong></div>
                                <div><em>{{ $logo->original_name }}</em></div>
                                <div>{{ round($logo->size / 1024) }}kb</div>
                                <div class="text-muted"> <small>{{ $logo->updated_at }}</small> </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{ Storage::url($logo->path) }}" target="_blank" class="m-1 btn btn-secondary">
                                    <span class="fa fa-download"></span>
                                </a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $logo->id }}" class="m-1 btn btn-danger">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('layouts.modal-delete', [
                    'title' => $logo->original_name . ' dari ' . $logo->fileable->name,
                    'id' => $logo->id,
                ])

            @empty
                <div class="card">
                    <div class="card-body py-5">
                        <h3 class="d-flex justify-content-center align-items-center p-4">
                            <img loading="lazy" src="{{ asset('assets/images/illustrations/undraw_printing_invoices_5r4r.svg') }}" width="200">
                            <h4 class="text-center">{{ __('app.data_unavailable') }}</h4>
                        </h3>
                    </div>
                </div>
            @endforelse

            @if($total)
                <div class="card-footer d-flex justify-content-between pb-0 m-2" style="border-radius: 10px;">
                    <h4>Total: <strong>{{ number_format($total, 0, ',', '.') }}</strong> </h4>

                    {{ $logos->onEachSide(1)->links() }}
                </div>
            @endif

          </div>
        </div>

</div>
