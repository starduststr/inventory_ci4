<?= $this->extend('layouts/superadmin');?>

<?= $this->section('content');?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <center>Selamat Datang <?= user()->username;?> <br> Silahkan pilih salah satu menu untuk menggunakan aplikasi ini.</center>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ;?>