
<div class="content-wrapper">
    
    <h1>Edit Data Mobil</h1>
    <!-- <?php if ($this->session->flashdata('success')): ?>
				<p class="success"><?= $this->session->flashdata('success') ?></p>
			<?php endif; ?>

			<?php if ($this->session->flashdata('error')): ?>
				<p class="error"><?= $this->session->flashdata('error') ?></p>
				
			<?php endif; ?> -->
    <form action="<?= base_url('data_mobil/update') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="plat" value="<?= $mobil["plat"] ?>">
        <table>
            <tr>
                <td>Tahun</td>
                <td><input type="text" name="tahun" value="<?= $mobil["tahun"] ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?= $mobil["harga"] ?>"></td>
            </tr>
            <tr>
                <td>Merk dan Type</td>
                <td><input type="text" name="merk_type" value="<?= $mobil["merk_type"] ?>"></td>
            </tr>
            <tr>
                <td>Foto Kendaraan</td>
                <td><input type="text" name="foto" value="<?= $mobil["foto"] ?>" readonly></td>
            </tr>
            <tr>
                <td>ID Owner</td>
                <td><input type="text" name="id_owner" value="<?= $mobil["id_owner"] ?>" readonly></td>
            </tr>
            <tr>
                <td></td>
				<th><input size="20" type="file"  name="foto"  accept="image/jpeg,image/png,image/jpg"></th>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
        <?php
        
        // echo "<pre>";print_r($mobil);die();
        ?>
    </form>
</div>  