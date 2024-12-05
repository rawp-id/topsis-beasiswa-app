<div>
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="/dashboard" wire:navigate>Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/penghasilan-ortu" wire:navigate>Penghasilan Ortu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Edit Penghasilan Ortu</h4>
                </div>
            </div>
            <form wire:submit="update()">
                @csrf
                <div class="mb-3">
                    <label for="kriteria_id" class="form-label">Kriteria</label>
                    <select wire:model="kriteria_id" class="form-select">
                        <option value="">Select Kriteria</option>
                        @foreach ($kriterias as $kriteria)
                            <option value="{{ $kriteria->id }}"
                                {{ $PenghasilanOrtu->kriteria_id == $kriteria->id ? 'selected' : '' }}>
                                {{ $kriteria->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" wire:model="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" wire:model="keterangan" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="bobot" class="form-label">Bobot</label>
                    <input type="number" wire:model="bobot" class="form-control">
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>
