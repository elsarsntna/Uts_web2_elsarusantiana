<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <form method="post">
        <h3></h3>
        <select name="kalkulator">
            <option value="">Pilih oprator kalkulator</option>
            <option value="penambahan">Pertambahan</option>
            <option value="pengurangan">Pengurangan</option>
            <option value="perkalian">Perkalian</option>
            <option value="pembagian">Pembagian</option>
        </select> <br><br>
        
        <label>Masukan nilai 1</label><br>
        <input type="text" name="nilai1"><br><br>
        
        <label>Masukan nilai 2</label><br>
        <input type="text" name="nilai2"><br><br>
        
        <input type="submit" value="Hitung">
    </form>

    <?php
    function tambah($a, $b) {
        return $a + $b;
    }

    function kurang($a, $b) {
        return $a - $b;
    }

    function kali($a, $b) {
        return $a * $b;
    }

    function bagi($a, $b) {
        if ($b == 0) {
            return "Error (Pembagi 0)";
        }
        return $a / $b;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $pilihan = $_POST['kalkulator'];
        $nilai1 = $_POST['nilai1'];
        $nilai2 = $_POST['nilai2'];
        $hasil = 0;
        $operator = "";

        if ($pilihan == 'penambahan') {
            $hasil = tambah($nilai1, $nilai2);
            $operator = "+";
        } elseif ($pilihan == 'pengurangan') {
            $hasil = kurang($nilai1, $nilai2);
            $operator = "-";
        } elseif ($pilihan == 'perkalian') {
            $hasil = kali($nilai1, $nilai2);
            $operator = "x";
        } elseif ($pilihan == 'pembagian') {
            $hasil = bagi($nilai1, $nilai2);
            $operator = "/";
        }

        echo "<h3>Hasil: $nilai1 $operator $nilai2 = $hasil</h3>";
    }
    ?>
    
   
</body>
</html>