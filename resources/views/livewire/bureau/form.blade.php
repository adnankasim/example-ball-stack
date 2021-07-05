                    <div class="form-group mb-3 ">
                      <label class="form-label">Nama Lengkap</label>
                      <div >
                        <input wire:model.lazy="bureau.name" type="text" class="form-control" placeholder="Contoh: Dinas Kependudukan & Catatan Sipil">
                        @error('bureau.name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Nama Singkat</label>
                      <div >
                        <input wire:model.lazy="bureau.short_name" type="text" class="form-control" placeholder="Contoh: DUKCAPIL">
                        @error('bureau.short_name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Email</label>
                      <div >
                        <input wire:model.lazy="bureau.email" type="text" class="form-control" placeholder="Contoh: dukcapil.kubar@kantor.go.id">
                        @error('bureau.email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Telepon</label>
                      <div >
                        <input wire:model.lazy="bureau.phone" type="text" class="form-control" placeholder="Contoh: 082195427691">
                        @error('bureau.phone')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Alamat</label>
                      <div>
                          <textarea wire:model.lazy="bureau.address" class="form-control" name="example-textarea-input" rows="2"></textarea>
                          @error('bureau.address')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Logo</label>
                      <div>
                          <input type="file" wire:model.lazy="logo" class="form-control">
                          @error('logo')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
