<div class="modal fade" id="editkondisi<?php echo $id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editkondisiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editkondisiLabel">
                    Edit Kondisi - <?php echo $nm; ?>
                </h1>
            </div>
            <div class="modal-body">
                <form method="POST" class="row g-3 needs-validation" action="inc/process.php" enctype="multipart/form-data"
                    autocomplete="off" novalidate>
                    <input type="hidden" name="id_kondisi" id="id_kondisi" value="<?php echo $id; ?>">
                    <div class="col-12">
                        <label for="id_kondisi" class="form-label">
                            ID Kondisi
                        </label>
                        <input type="text" class="form-control bg-secondary-subtle" name="id_kondisi" id="id_kondisi"
                            value="<?php echo $id; ?>" readonly>
                    </div>
                    <div class="col-12">
                        <label for="nama_kondisi" class="form-label">Kondisi</label>
                        <input type="text" class="form-control" name="nama_kondisi" id="nama_kondisi" value="<?php echo $nm; ?>" required>
                        <div class="invalid-feedback">
                            Nama kondisi tidak boleh kosong
                        </div>
                    </div>
                    <div>
                    <button class="btn btn-success" name="form_process" value="update_kondisi">
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