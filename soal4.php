<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>To do list tugas soal no 4</h3>

    <form method="post">
        <label>tambah tugas baru</label><br>
        <input type="text" name="tugas" required>
        <button type="submit" name="tambah">simpan tugas</button>
    </form>

    <hr>

    <h3>Daftar tugas</h3>
       <ul>
        <?php
        $file_name = "todo.txt";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
            $tugas_baru = trim($_POST['tugas']);
            if (!empty($tugas_baru)) {
                $file = fopen($file_name, "a");
                fwrite($file, $tugas_baru . "\n");
                fclose($file);
            }
        }

        if (isset($_GET['hapus'])) {
            $index_hapus = $_GET['hapus'];
            if (file_exists($file_name)) {
                
                $baris_tugas = file($file_name);
                
               
                if (isset($baris_tugas[$index_hapus])) {
                    unset($baris_tugas[$index_hapus]);
                    
                  
                    $file = fopen($file_name, "w");
                    foreach ($baris_tugas as $tugas) {
                        fwrite($file, $tugas);
                    }
                    fclose($file);
                }
            }
           
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }

   
        if (file_exists($file_name)) {
            $file = fopen($file_name, "r");
            
          
            if (filesize($file_name) > 0) {
                $index = 0;
               
                while (($line = fgets($file)) !== false) {
                    $line = trim($line);
                    if (!empty($line)) {
                        echo "<li>" . htmlspecialchars($line) . " 
                              <a href='?hapus=$index' onclick='return confirm(\"Yakin ingin menghapus tugas ini?\")' style='color:red;'>[Hapus]</a></li>";
                    }
                    $index++;
                }
            } else {
                echo "<li>Belum ada tugas yang tersimpan.</li>";
            }
            fclose($file);
        } else {
            echo "<li>Belum ada tugas yang tersimpan.</li>";
        }
        ?>
    </ul>
</body>
</html>

</body>

</html>