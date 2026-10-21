<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h2>Form Daftar Belanja</h2>
    <form method="post">
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>Pilih</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Jumlah Beli</th>
            </tr>
            <?php
            $daftar_barang = [
                "Buku Tulis" => 5000,
                "Pensil" => 2000,
                "Pulpen" => 3000,
                "Penggaris" => 4000,
                "Penghapus" => 1500
            ];

            foreach ($daftar_barang as $nama => $harga) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='barang[]' value='$nama'></td>";
                echo "<td>$nama</td>";
                echo "<td>Rp " . number_format($harga, 0, ',', '.') . "</td>";
                echo "<td><input type='number' name='jumlah[$nama]' value='0' min='0'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <button type="submit" name="hitung">Hitung Total Belanja</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hitung'])) {
        echo "<h3>Rincian Pembelanjaan:</h3>";
        $total_semua = 0;

        if (isset($_POST['barang'])) {
            $pilihan = $_POST['barang'];
            $jumlah_beli = $_POST['jumlah'];

            echo "<ul>";
            foreach ($pilihan as $item) {
                $qty = $jumlah_beli[$item];
                if ($qty > 0) {
                    $harga_satuan = $daftar_barang[$item];
                    $subtotal = $harga_satuan * $qty;
                    $total_semua += $subtotal;

                    echo "<li>$item ($qty x Rp " . number_format($harga_satuan, 0, ',', '.') . ") = Rp " . number_format($subtotal, 0, ',', '.') . "</li>";
                }
            }
            echo "</ul>";
            echo "<h4>Total Keseluruhan Belanja: Rp " . number_format($total_semua, 0, ',', '.') . "</h4>";
        } else {
            echo "<p style='color: red;'>Silakan pilih minimal satu barang dan masukkan jumlahnya!</p>";
        }
    }
    ?>
</body>
</html>