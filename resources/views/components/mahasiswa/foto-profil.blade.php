 <div class="card">
     <div class="card-body">
         <div class="d-flex justify-content-center align-items-center flex-column">
             <p class="text-muted mt-1 mb-1 fw-light">Klik pada foto untuk mengubah foto profil
             </p>
             <div class="avatar avatar-2x1 position-relative">

                 <img src="{{ $foto }}" style="width: 100px; height: 100px;" data-bs-toggle="modal"
                     data-bs-target="#exampleModal" alt="Avatar">
             </div>

             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                        <form action="{{route('mahasiswa.photo')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profil
                             </h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>

                         <div class="modal-body d-flex flex-column align-items-center">
                             <div class="mb-3">
                                 <img id="avatarImg" class="mb-2" src="{{ $foto }}"
                                     style="width: 360px; height: 360px;" alt="Avatar">
                                 <!-- Optional: Adding mb-2 for some margin between the image and input -->
                                 <h5 for="formFile" class="form-label mb-2">Pilih Foto
                                     Profil</h5>
                                 <input type="file" class="form-control" id="formFile" onchange="updateAvatar()" name="foto" required>
                             </div>
                         </div>
                         <script>
                             const myModal = document.getElementById('exampleModal');

                             myModal.addEventListener('hidden.bs.modal', function() {
                                 closeModal();
                             });

                             function closeModal() {
                                 const input = document.getElementById('formFile');
                                 const img = document.getElementById('avatarImg');

                                 input.value = '';
                                 img.src = '{{ $foto }}';
                                 // console.log(img)
                             }

                             function updateAvatar() {
                                 const input = document.getElementById('formFile');
                                 const img = document.getElementById('avatarImg');

                                 if (input.files && input.files[0]) {
                                     const reader = new FileReader();

                                     reader.onload = function(e) {
                                         img.src = e.target.result;
                                     };

                                     reader.readAsDataURL(input.files[0]);
                                 }
                                 // console.log(img)
                             }
                         </script>

                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-primary">Simpan
                                 perubahan</button>

                         </div>
                        </form>
                     </div>
                 </div>
             </div>

             <h3>{{ $nama }}</h3>
             <p class="text-small">Mahasiswa</p>
         </div>
     </div>
 </div>
