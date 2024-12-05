<div>
    <div class="content-body">
        <div class="container pd-x-0">
            <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                            <li class="breadcrumb-item"><a href="/dashboard" wire:navigate>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tanggungan Ortu</li>
                        </ol>
                    </nav>
                    <h4 class="mg-b-0 tx-spacing--1">Data Tanggungan Ortu</h4>
                </div>
                <div>
                    <!-- Button to open create modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createitemsModal">Add
                        New Tanggungan Ortu</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="tableData" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kriteria</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th>Bobot</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tanggungan as $items)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $items->kriteria ? $items->kriteria->nama : '-' }}</td>
                                    <td>{{ $items->nama }}</td>
                                    <td>{{ $items->keterangan }}</td>
                                    <td>{{ $items->bobot }}</td>
                                    <td>
                                        <!-- Button to open edit modal -->
                                        <a class="btn btn-warning btn-sm" href="{{ route('tanggungan-ortu.edit', $items->id ) }}" wire:navigate>Edit</a>

                                        <!-- Button to open delete confirmation modal -->
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteitemsModal{{ $items->id }}">Delete</button>
                                    </td>
                                </tr>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteitemsModal{{ $items->id }}"
                                    tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Tanggungan Ortu</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this Tanggungan Ortu?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button wire:click="delete({{ $items->id }})"
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
    <div class="modal fade" id="createitemsModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Pekerjaan
                            Ortu
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="kriteria_id" class="form-label">Kriteria</label>
                            <select wire:model="kriteria_id" class="form-select" required>
                                <option value="">Select Kriteria</option>
                                @foreach ($kriterias as $kriteria)
                                    <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
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
