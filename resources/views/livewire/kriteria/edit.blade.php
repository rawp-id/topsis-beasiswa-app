<div>
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="/dashboard" wire:navigate>Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/kriteria" wire:navigate>Kriteria</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Edit Kriteria</h4>
                </div>
            </div>
            <form wire:submit="update()">
                @csrf
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" wire:model="kode" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" wire:model="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <select wire:model="tipe" class="form-select" required>
                        <option value="">Select Tipe</option>
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="bobot" class="form-label">Bobot</label>
                    <input type="number" wire:model="bobot" class="form-control" required>
                </div>
                <a href="/kriteria" wire::navigate class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>
