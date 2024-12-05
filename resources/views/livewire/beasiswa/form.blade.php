<div>
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="/dashboard" wire:navigate>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Apply Beasiswa</li>
                        </ol>
                    </nav>
                    <h3 class="mg-b-0 tx-spacing--1 mb-2">Apply Beasiswa</h3>
                    <p>Jangan lewatkan kesempatan emas ini untuk meraih beasiswa impian Anda! Dengan mendaftar beasiswa
                        ini, Anda berpeluang mendapatkan dukungan finansial untuk melanjutkan pendidikan ke jenjang yang
                        lebih tinggi. Segera lengkapi formulir pendaftaran dan raih masa depan gemilang bersama kami!
                    </p>
                </div>
            </div>


            <form wire:submit.prevent="submit">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="mg-b-0">Data Pribadi</h4>
                    </div>
                    <div class="card-body">
                        <!-- Nama Lengkap -->
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" class="form-control" wire:model="nama"
                                placeholder="Masukkan nama lengkap">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Asal Sekolah -->
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" id="asal_sekolah" class="form-control" wire:model="asal_sekolah"
                                placeholder="Masukkan asal sekolah">
                            @error('asal_sekolah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor Induk -->
                        <div class="form-group">
                            <label for="nomor_induk">Nomor Induk</label>
                            <input type="text" id="nomor_induk" class="form-control" wire:model="nomor_induk"
                                placeholder="Masukkan nomor induk">
                            @error('nomor_induk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" class="form-control" wire:model="tempat_lahir"
                                placeholder="Masukkan tempat lahir">
                            @error('tempat_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" class="form-control" wire:model="tanggal_lahir">
                            @error('tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="form-control" wire:model="jenis_kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Agama -->
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" id="agama" class="form-control" wire:model="agama"
                                placeholder="Masukkan agama">
                            @error('agama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" class="form-control" wire:model="alamat" placeholder="Masukkan alamat lengkap"></textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" id="no_hp" class="form-control" wire:model="no_hp"
                                placeholder="Masukkan nomor HP">
                            @error('no_hp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nilai -->
                        <div class="form-group">
                            <label for="Nilai_id">Nilai Rata-Rata</label>
                            <select id="Nilai_id" class="form-control" wire:model="Nilai_id">
                                <option value="">Pilih Nilai</option>
                                @foreach ($nilais as $item)
                                    <option value="{{ $item->id }}">{{ $item->nilai }}</option>
                                @endforeach
                            </select>
                            @error('Nilai_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <p><i>Silakan lengkapi formulir di bawah ini dengan data pribadi Anda untuk mendaftar beasiswa.
                                Pastikan semua informasi yang Anda masukkan adalah benar dan akurat.</i></p>

                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4 class="mg-b-0">Data Orang Tua</h4>
                    </div>
                    <div class="card-body">
                        <!-- Pekerjaan Orang Tua -->
                        <div class="form-group">
                            <label for="Pekerjaan_Ortu_id">Pekerjaan Orang Tua</label>
                            <select id="Pekerjaan_Ortu_id" class="form-control" wire:model="Pekerjaan_Ortu_id">
                                <option value="">Pilih Pekerjaan Orang Tua</option>
                                @foreach ($pekerjaanOrtus as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('Pekerjaan_Ortu_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tanggungan Orang Tua -->
                        <div class="form-group">
                            <label for="Tanggungan_Ortu_id">Tanggungan Orang Tua</label>
                            <select id="Tanggungan_Ortu_id" class="form-control" wire:model="Tanggungan_Ortu_id">
                                <option value="">Pilih Tanggungan Orang Tua</option>
                                @foreach ($tanggunganOrtus as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('Tanggungan_Ortu_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Penghasilan Orang Tua -->
                        <div class="form-group">
                            <label for="Penghasilan_Ortu_id">Penghasilan Orang Tua</label>
                            <select id="Penghasilan_Ortu_id" class="form-control" wire:model="Penghasilan_Ortu_id">
                                <option value="">Pilih Penghasilan Orang Tua</option>
                                @foreach ($penghasilanOrtus as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('Penghasilan_Ortu_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Usia Orang Tua -->
                        <div class="form-group">
                            <label for="Usia_Orangtua_id">Usia Orang Tua</label>
                            <select id="Usia_Orangtua_id" class="form-control" wire:model="Usia_Orangtua_id">
                                <option value="">Pilih Usia Orang Tua</option>
                                @foreach ($usiaOrtus as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('Usia_Orangtua_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="card mt-4">
                    <div class="card-header text-center">
                        <h4 class="mg-b-0">Keterangan</h4>
                    </div>

                    <div class="card-body">
                        <!-- Keterangan (Optional) -->
                        <div class="form-group">
                            {{-- <label for="keterangan">Keterangan (Opsional)</label> --}}
                            <textarea id="keterangan" class="form-control" wire:model="keterangan"
                                placeholder="Masukkan keterangan tambahan jika ada" rows="4"></textarea>
                            @error('keterangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 mt-4">Ajukan Beasiswa</button>
            </form>

        </div>
    </div>
</div>
