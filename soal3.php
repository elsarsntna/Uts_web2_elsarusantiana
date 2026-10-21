<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soal n0 3</title>
</head>

<body>
    <form method="post">
        <h3>Kategori usia</h3>

        <label for="">masukan usia anda</label>
        <input type="text" name="usia"><br>
        <br><br>
        <input type="submit" value="cek kategori usia">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usia = $_POST['usia'];

       
         if ($usia >= 60) {
            echo "<h3>lansia</h3>";
        } elseif ($usia >= 30) {
            echo "<h3>dewasa</h3>";
        } elseif ($usia >= 17) {
            echo "<h3>remaja </h3>";
        } else {
            echo "<h3>anak anak</h3>";
        }
    





    }

    ?>
</body>

</html>