<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 5px;
}

th {
  background-color: #4CAF50;
  font-weight: bold;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid grey;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid black;
}

.responsive {
  width: 100%;
  height: auto;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body onload="printCetak()">
<?php 
        function waktu_lalu($timestamp) {
    $selisih = time() - strtotime($timestamp) ;
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    return $waktu;
}
         ?>
<h2 style="text-align: center;"><?php echo $title; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Telp/HP</th>
      <th>Status</th>
      <th>Tgl Registrasi</th>
      <th>Member Sejak</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($member as $pro): ?>
        <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo $pro['user_nama']; ?></td>
            <td><?php echo $pro['user_email']; ?></td>
            <td><?php echo $pro['user_telp']; ?></td>
            <td>
              <?php if($pro['user_status'] == 0) { ?>
                Belum Aktif
              <?php }elseif($pro['user_status'] == 1) { ?>
                Aktif
              <?php }else { ?>
                Terblokir
              <?php } ?>
            </td>
            <td><?php echo date('d-m-Y H:i:s', strtotime($pro['user_created'])); ?></td>
            <td><?php echo waktu_lalu($pro['user_created']); ?></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</div>
<script>
    function printCetak() {
      window.print();
    }
</script>
</body>
</html>
