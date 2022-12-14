<?= $this->extend('layouts/superadmin');?>

<?= $this->section('content');?>

<div class="container-fluid">
    <div class="col-md-12">
    <?php if(session()->getFlashdata('success')){?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success');?>
        </div>
    <?php }?> 
    <?php if(session()->getFlashdata('failed')){?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('failed');?>
        </div>
    <?php }?>   
    <button type="button" class="btn btn-primary mb-4 mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-plus"></i> Tambah Data
    </button>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5>Data Barang Masuk</h5>
                </div>
                <div class="">
                    <table class="table table-stripped">
                        <thead>
                            <th>NO.</th>
                            <th>Nama Barang</th>
                            <th>Status</th>
                            <th>Stok</th>
                            <th>Rak</th>
                            <th>Toko</th>
                            <th>Aksi</th>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach($barang as $data){
                                ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_barang'];?></td>
                                <td><?= $data['status_barang'];?></td>
                                <td><?= $data['stok'];?></td>
                                <td><?= $data['rak'];?></td>
                                <td><?= $data['toko'];?></td>
                                <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item btn btn-sm btn-danger" href="<?= base_url('databarang/delete?id_barang='.$data['id_barang']);?>"><i class="bi bi-trash"></i> Hapus</a></li>
                                        <li><a class="dropdown-item btn btn-sm btn-success" href="#" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit_barang(this)" data-id_barang="<?= $data['id_barang'];?>" data-nama_barang="<?= $data['nama_barang'];?>" data-status="<?= $data['status_barang'];?>" data-kategori="<?=$data['kategori'];?>" data-stok="<?= $data['stok'];?>" data-rak="<?= $data['rak'];?>" data-toko="<?= $data['toko'];?>"><i class="bi bi-pencil-square"></i> Edit</a></li>
                                    </ul>
                                </div>
                                </td>
                            </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('databarang/insert');?>" class="form-group" method="POST">
            <?= csrf_field();?>
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Input disini">
            <label for="status_barang">Status Barang</label>
            <select name="status_barang" id="" class="form-control">
                <option value="" selected disabled>--Pilih--</option>
                <option value="baik">Baik</option>
                <option value="kurang baik">Kurang Baik</option>
            </select>
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?= $kategori;?>" readonly>
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" placeholder="0">
            <label for="rak">Rak</label>
            <input type="text" name="rak" class="form-control" placeholder="Input disini">
            <label for="Toko">Toko</label>
            <input type="text" name="toko" class="form-control" placeholder="Input disini">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal edit-->
<div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editLabel">Edit Data Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('databarang/update');?>" method="post" class="form-group">
        <?= csrf_field();?>
            <input type="hidden" id="id_barang" name="id_barang">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Input disini">
            <label for="status_barang">Status Barang</label>
            <select name="status_barang" id="status_barang" class="form-control">
                <option value="" selected disabled>--Pilih--</option>
                <option value="baik">Baik</option>
                <option value="kurang baik">Kurang Baik</option>
            </select>
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" readonly>
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" placeholder="0">
            <label for="rak">Rak</label>
            <input type="text" name="rak" id="rak" class="form-control" placeholder="Input disini">
            <label for="Toko">Toko</label>
            <input type="text" name="toko" id="toko" class="form-control" placeholder="Input disini">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>
    function edit_barang(e){
        var data = $(e)
        $('#id_barang').val(data.data('id_barang'))
        $('#nama_barang').val(data.data('nama_barang'))
        $('#status_barang').val(data.data('status'))
        $('#kategori').val(data.data('kategori'))
        $('#stok').val(data.data('stok'))
        $('#rak').val(data.data('rak'))
        $('#toko').val(data.data('toko'))
        console.log(data)

    }
</script>
<?= $this->endSection() ;?>