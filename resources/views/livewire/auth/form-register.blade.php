<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit='register'>
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" wire:model='name' class="form-control" placeholder="Masukkan nama Anda">
        </div>
        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" wire:model='email' class="form-control" placeholder="Masukkan alamat email Anda">
        </div>
        <div class="form-group">
            <div class="d-flex justify-content-between mg-b-5">
                <label class="mg-b-0-f">Kata Sandi</label>
            </div>
            <input type="password" wire:model='password' class="form-control" placeholder="Masukkan kata sandi Anda">
        </div>
        <div class="form-group">
            <label>Ulangi Kata Sandi</label>
            <input type="password" wire:model='password_confirmation' class="form-control"
                placeholder="Masukkan ulang kata sandi Anda">
        </div>
        <div class="form-group tx-12">
            Dengan mengklik <strong>Buat akun</strong> di bawah, Anda setuju dengan syarat layanan dan
            pernyataan privasi kami.
        </div><!-- form-group -->

        <button type="submit" class="btn btn-brand-02 w-100">Buat Akun</button>
    </form>
</div>
