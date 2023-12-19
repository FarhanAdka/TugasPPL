<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('mahasiswa.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-3">
                        <h4>Ganti Password</h4>
                    </div>

                    <div class="mb-3">
                        <label for="old_password">Password Lama</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">Masukkan password lama anda.</div>
                    </div>

                    <div class="mb-3">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">Masukkan password baru yang akan dipakai.</div>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_new_password">Password Baru</label>
                        <input type="password" class="form-control" id="confirm_new_password"
                            name="confirm_new_password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">Tuliskan kembali password baru.</div>
                        <div id="passwordMismatchAlert" class="text-danger" style="display: none;">
                            Password baru dan konfirmasi password tidak sesuai.
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Ubah Password
                        </button>
                        <a class="btn btn-danger">
                            <i class="fa fa-undo"></i>Reset
                        </a>
                    </div>
                </form>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const newPassword = document.getElementById('new_password');
                        const confirmNewPassword = document.getElementById('confirm_new_password');
                        const passwordMismatchAlert = document.getElementById('passwordMismatchAlert');
                        const form = document.getElementById('passwordChangeForm');
                        const submitButton = document.getElementById('submitButton');

                        form.addEventListener('submit', function(event) {
                            if (newPassword.value !== confirmNewPassword.value) {
                                event.preventDefault();
                                passwordMismatchAlert.style.display = 'block';
                            } else {
                                passwordMismatchAlert.style.display = 'none';
                            }
                        });

                        // Optional: Reset button functionality
                        const resetButton = document.getElementById('resetButton');
                        resetButton.addEventListener('click', function(event) {
                            event.preventDefault();
                            newPassword.value = '';
                            confirmNewPassword.value = '';
                            passwordMismatchAlert.style.display = 'none';
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
