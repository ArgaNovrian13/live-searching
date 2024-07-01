<?php
if(isset($_POST['query'])) {
    $query = $_POST['query'];
    $namaFile = 'data.txt';
    $file = fopen($namaFile,'r');
    if($file === false){
        die('Tidak bisa membuka file'.$namaFile);
    }

    $header = fgets($file); 
    $found = false;
    while(($garis = fgets($file)) !== false) {
        $data = explode(',', trim($garis));
        foreach($data as $cell) {
            if (strpos(strtolower($cell), strtolower($query)) !== false) {
                echo '<tr>';
                foreach($data as $cell) {
                    echo '<td>'.htmlspecialchars($cell).'</td>';
                }
                echo '</tr>';
                $found = true;
                break; 
            }  
        }
    } 
    fclose($file);
    if(!$found) {
      echo "<tr><td colspan='".count(explode(',', $header))."'>Data tidak ditemukan</td></tr>";
  }
}

