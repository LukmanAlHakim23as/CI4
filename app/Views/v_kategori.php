<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title">Data <?= $judul ?> </h3>
      <div class="card-tools">
        <button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-plus"></i>Add
        </button>
      </div>

    </div>

    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr class="text-center">
            <th width="50px"> NO </th>
            <th> Nama Kategori </th>
            <th width="100px"> Action </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kategori as $row) : ?>
            <tr>
              <td><?= $row['f_id']?></td>
              <td> <?= $row['f_kategori'] ?></td>
              <td>
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit-<?= $row['f_id']; ?>">
                  <i class="fas fa-edit"></i>
                </button>
                <a class="btn btn-sm btn-danger" onclick="return confirm ('apakah data akan di hapus?')" href="<?php echo base_url('Kategori/hapuskategori'); ?>/<?= $row['f_id']; ?>"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- modal -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Kategori/tambahKategori') ?>" method="POST">
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<!-- model edit -->
<?php foreach ($kategori as $row) : ?>
  <div class="modal fade" id="modal-edit-<?= $row['f_id']; ?>">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Kategori</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('Kategori/editKategori') ?>" method="POST">
            <input type="hidden" value="<?= $row['f_id']; ?>" name="id">
            <div class="form-group">
              <label for="nama_kategori">Nama Kategori</label>
              <input value="<?= $row['f_kategori']; ?>" type="text" class="form-control" name="nama_kategori">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach; ?>