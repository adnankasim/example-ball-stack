    <div class="modal modal-blur fade" id="modal-delete-{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <h2 class="text-danger"><span class="fa fa-exclamation-triangle fa-3x"></span></h2>
            <h3 class="text-danger text-wrap">Anda Yakin Menghapus '{{ $title }}' ?</h3>
            <div class="text-muted text-wrap">Data Yang Telah Dihapus Tidak Bisa Dikembalikan Lagi.</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn btn-white w-100" data-bs-dismiss="modal">
                    <span class="fa fa-ban"></span> &nbsp; Batal
                  </a></div>
                <div class="col">
                    <button type="button" wire:click="destroy({{ $id }})" class="btn btn-danger w-100" data-bs-dismiss="modal">
                        <span class="fa fa-trash"></span> &nbsp; Hapus
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
