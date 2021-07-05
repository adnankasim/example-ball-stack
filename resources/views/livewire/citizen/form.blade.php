                    <div class="form-group mb-3 ">
                      <label class="form-label">Nama Lengkap</label>
                      <div >
                        <input wire:model.lazy="citizen.name" type="text" class="form-control" placeholder="Contoh: Alif Perdana Sugeha">
                        @error('citizen.name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Username</label>
                      <div >
                        <input wire:model.lazy="citizen.username" type="text" class="form-control" placeholder="Contoh: alif.perdana.sugeha">
                        @error('citizen.username')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Email</label>
                      <div >
                        <input wire:model.lazy="citizen.email" type="email" class="form-control" placeholder="Contoh: alif.sugeha@gmail.com">
                        @error('citizen.email')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Password</label>
                      <div >
                        <input wire:model.lazy="citizen.password" type="password" class="form-control">
                        @error('citizen.password')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Telepon</label>
                      <div >
                        <input wire:model.lazy="citizen.phone" type="number" class="form-control" placeholder="Contoh: 082195427691">
                        @error('citizen.phone')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    {{-- @if(!($is_edit))
                    <div class="form-group mb-3 ">
                      <label class="form-label">NIK</label>
                      <div >
                        <input wire:model.lazy="citizen.nik" type="text" class="form-control" placeholder="Contoh: 1234567890123456">
                        @error('citizen.nik')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    @endif --}}
                    <div class="form-group mb-3 ">
                      <label class="form-label">No. KK</label>
                      <div >
                        <input wire:model.lazy="citizen.kk_number" type="text" class="form-control" placeholder="Contoh: 1234567890123456">
                        @error('citizen.kk_number')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Tempat Lahir</label>
                      <div >
                        <input wire:model.lazy="citizen.birth_place" type="text" class="form-control" placeholder="Contoh: Kel. Biga, Kota Kotamobagu, Prov. Sulawesi Utara">
                        @error('citizen.birth_place')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Tanggal Lahir</label>
                      <div >
                        <input type="date" wire:model.lazy="citizen.birth_date" class="form-control">
                        @error('citizen.birth_date')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Jenis Kelamin</label>
                      <div>
                          <select wire:model.lazy="citizen.sex" class="form-control">
                              <option>-- Jenis Kelamin --</option>
                              <option value="f">Perempuan</option>
                              <option value="m">Laki-Laki</option>
                          </select>
                        @error('citizen.sex')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Warga Negara</label>
                      <div>
                          <select wire:model.lazy="citizen.citizenship" class="form-control">
                              <option>-- Warga Negara --</option>
                              <option value="wni">Indonesia</option>
                              <option value="wna">Asing</option>
                          </select>
                        @error('citizen.citizenship')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Foto</label>
                      <div>
                          <input type="file" wire:model.lazy="photo" class="form-control">
                          @error('photo')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">KTP</label>
                      <div>
                          <input type="file" wire:model.lazy="ktp" class="form-control">
                          @error('ktp')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group mb-3 ">
                      <label class="form-label">Foto dengan KTP</label>
                      <div>
                          <input type="file" wire:model.lazy="photo_with_ktp" class="form-control">
                          @error('photo_with_ktp')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
