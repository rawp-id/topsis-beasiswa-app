<div>
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="/dashboard" wire:navigate>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kriteria</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Data Kriteria</h4>
                </div>
                <div>
                    <!-- Button to open create modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createkriteriaModal">Add New Kriteria</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="tableData" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Bobot</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kriteria->kode}}</td>
                                    <td>{{ $kriteria->nama }}</td>
                                    <td>{{ $kriteria->tipe }}</td>
                                    <td>{{ $kriteria->bobot }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('kriteria.edit', $kriteria->id ) }}" wire:navigate>Edit</a>

                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deletekriteriaModal{{ $kriteria->id }}">Delete</button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deletekriteriaModal{{ $kriteria->id }}"
                                    tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Kriteria</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this Kriteria?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button wire:click="delete({{ $kriteria->id }})"
                                                    class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createkriteriaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
