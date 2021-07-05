    <div class="modal modal-blur fade" id="modal-activation-{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-{{ $is_active ? 'warning' : 'primary' }}"></div>
          <div class="modal-body text-center py-4">
            <h2 class="text-{{ $is_active ? 'warning' : 'primary' }}"><span class="fa fa-check-circle fa-3x"></span></h2>
            <h3 class="text-{{ $is_active ? 'warning' : 'primary' }} text-wrap">Apa anda yakin untuk {{ $is_active ? 'Menonaktifkan' : 'Mengaktifkan' }} User '{{ $title }}' ?</h3>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                    <span class="fa fa-ban"></span> &nbsp; Batal
                  </a></div>
                <div class="col">
                    <button type="button" wire:click="activation({{ $id }})" class="btn btn-{{ $is_active ? 'warning' : 'primary' }} w-100" data-bs-dismiss="modal">
                        <span class="fa fa-check-square"></span> &nbsp; {{ $is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
