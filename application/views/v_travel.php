<!DOCTYPE html>
<head>
   <title>Daftar monbil</title>
</head>
<body>
    <table border="1px solid black">
        <tr>
            <th>PLAT</th>
            <th>MERK DAN TYPE</th>
            <th>HARGA</th>
            <th>TAHUN</th>
        </tr>

        <?php foreach($travel as $tvl): ?>
        <tr>
            <td><?php echo $tvl['plat']; ?></td>
            <td><?php echo $tvl['merk_type']; ?></td>
            <td><?php echo $tvl['harga']; ?></td>
            <td><?php echo $tvl['tahun']; ?></td>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>