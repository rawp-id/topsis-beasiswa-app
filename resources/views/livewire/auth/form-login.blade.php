<div>
    <form wire:submit='login'>
        @csrf
        <h3 class="tx-color-01 mg-b-5">Masuk</h3>
        <p class="tx-color-03 tx-16 mg-b-40">Selamat datang kembali! Silakan masuk untuk melanjutkan.</p>

        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" wire:model='email' name="email" class="form-control" placeholder="Masukkan Email Anda">
        </div>
        <div class="form-group">
            <div class="d-flex justify-content-between mg-b-5">
                <label class="mg-b-0-f">Kata Sandi</label>
                <a href="" class="tx-13">Lupa kata sandi?</a>
            </div>
            <input type="password" wire:model='password' name="password" class="form-control"
                placeholder="Masukkan Kata Sandi Anda">
        </div>
        <button type="submit" class="btn btn-brand-02 w-100">Masuk</button>
    </form>
</div>
