<?php include("include/header.php"); ?>

<body>
    <div class="container">
        <h2 class="alert alert-primary text-center mt-3">Silahkan Masukan Data Diri Anda</h2>
        <form action="">
            <div class="from-group">
                <Label>Nama Lengkap</Label>
                <input type="text" name="" class="form-control" placeholder="Masukan Nama Lengkap Anda">
            </div>

            <div class="from-group">
                <Label>Email</Label>
                <input type="email" name="" class="form-control" placeholder="Masukan Email Anda">
            </div>

            <div class="from-group">
                <Label>Alamat</Label>
                <input type="text" name="" class="form-control" placeholder="Masukan Alamat Anda">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="from-group">
                        <Label>Tempat Lahir</Label>
                        <input type="text" name="" class="form-control" placeholder="Masukan Tanggal Lahir Anda"
                            id="TempatLahir">
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="from-group">
                        <Label>Tanggal Lahir</Label>
                        <input type="date" name="" class="form-control">
                    </div>

                </div>
            </div>

            <div class="from-group">
                <label for="formFileDisabled" class="form-label">Masukan Foto KTP Anda</label>
                <input class="form-control" type="file" id="formFileDisabled" disabled />
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="from-group">
                        <label>Berapa Hari Penyewaan</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">1 hari</option>
                            <option value="2">2 hari</option>
                            <option value="3">3 hari</option>
                            <option value="4">4 hari</option>
                            <option value="5">5 hari</option>
                            <option value="6">6 hari</option>
                            <option value="7">7 hari</option>
                            <option value="7">1 minggu</option>
                            <option value="7">1 bulan</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="from-group">
                        <label>Driver Atau No driver</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Driver</option>
                            <option value="2">No Driver</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="from-group">
                <label>Pilih kendaraan</label>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">Avanza</option>
                    <option value="2">Xenia</option>
                    <option value="3">Innova</option>
                    <option value="4">Brio</option>
                    <option value="5">Agya</option>
                    <option value="6">Hiace</option>
                </select>
            </div>

            <div class="d-grid gap-2 col-6 mt-4 mx-auto">
                <button class="btn btn-primary" type="button" data-mdb-ripple-init>Pesan Sekarang</button>
            </div>

    







        </form>
    </div>
</body>



<?php include("include/footer.php"); ?>