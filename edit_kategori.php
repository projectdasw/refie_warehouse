<div class="modal fade" id="editkategori<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editkategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editkategoriLabel">
                    Edit Kategori - <?php echo $nm; ?>
                </h1>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
                    autocomplete="off" novalidate>
                    <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $id; ?>">
                    <div class="col-12">
                        <label for="id_kategori" class="form-label">
                            ID Kategori
                        </label>
                        <input type="text" class="form-control bg-secondary-subtle" name="id_kategori" id="id_kategori"
                            value="<?php echo $id; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?php echo $nm; ?>" required>
                        <div class="invalid-feedback">
                            Nama kategori tidak boleh kosong
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" name="form_process" value="update_kategori">
                            <i class="fa-solid fa-pencil"></i>
                            <span>Edit Data</span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fa-regular fa-circle-xmark"></i>
                    <span>Batal</span>
                </button>
            </div>
        </div>
    </div>
</div>