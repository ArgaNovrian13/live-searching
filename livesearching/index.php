<!DOCTYPE html>
<html lang="en" class="green lighten-2">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Live Searching PHP</title>
  <!-- Link Materialize  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> 
  <!-- Link CDN Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
  <div id="judul">
    <h2 class="flow-text center-align" style="font-size: 35px;">Live Searching PHP</h2>
  </div>
  <div id="form">
    <form action="">
      <div class="row">
        <div class="input-field ">
        <input type="text" class="input-field" name="cari_data" id="cari_data" style="font-weight: bold; border-width: 2px; border-color: black;" autocomplete="off">
         <label for="cari_data" class="black-text" style="font-size: 20px;">Cari Data</label>
        </div>
      </div>
    </form>
  </div>
  <div id="tabel" style="margin-bottom: 40px;">
    <!-- Baca File -->
  <?php
        $namaFile = 'data.txt';
        $file = fopen($namaFile,'r');
        if($file === false){
         die('Tidak bisa membuka file'.$namaFile);
        }
      ?>
    <table class="white centered  " >
      <thead class="blue">
       <?php
       $header = fgets($file);
       if($header !== false) :  
       ?>
       <tr >
       <?php
        $columns = explode(',',trim($header));
        foreach($columns as $column):
       ?>
       <th >
        <?= htmlspecialchars($column) ?>
       </th>
       <?php endforeach; ?>
       </tr>
       <?php endif; ?>
      </thead>
      <tbody>
        <?php while(($garis = fgets($file)) !== false) :?>
          <tr>
           <?php
           $data = explode(',', trim($garis));
           foreach($data as $cell):
           ?>
           <td>
            <?= htmlspecialchars($cell) ?>
            <?php endforeach; ?>
           </td>
          </tr>
          <?php endwhile; ?>
      </tbody>
    </table>
    <?php fclose($file);?>
  </div>
</div>
  <!-- Link Script Materialize -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
$(document).ready(function(){
    $('#cari_data').keyup(function(){
        var query = $(this).val();
        if(query != '') {
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {query: query},
                success: function(data){
                    $('#tabel tbody').html(data);
                }
            });
        } else {
            // Jika input kosong, tampilkan kembali semua data
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {query: ''},
                success: function(data){
                    $('#tabel tbody').html(data);
                }
            });
        }
    });
});
</script>
</body>
</html>