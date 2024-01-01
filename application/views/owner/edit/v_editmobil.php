<!-- <div class="content-wrapper">
    <h1>Edit Data Mobil</h1>
    <?php if ($dataMobil != null) { 
    // Lakukan sesuatu jika data tidak null?>
    <?= form_open('')?>
    <div class='form-group'>
        <label>Plat</label>
        <input type="text" class='form-control' name='p' value="<?= $dataMobil->tahun ?>">
    </div>

    <?= form_close('')?>
    <?php
    echo $dataMobil['plat']; // Akses properti "plat"
} else {
    // Lakukan sesuatu jika data bernilai null
    echo "Data tidak ditemukan atau bernilai null.";
}
?>
    
</div> -->

<div class="content-wrapper">
    <h1>Edit Data Mobil</h1>

    <?= form_open('')?>
        <div class='form-group'>
            <label>Plat</label>
            <input type="text" class="form-control" name="p" value="<?php echo $dataMobil->plat ?>">
        </div>
        
    <?= form_close('')?>
</div>


