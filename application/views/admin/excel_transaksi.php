<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" width="100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Tgl</th>
      <th>Kode</th>
      <th>Dari</th>
      <th>Total</th>
      <th>Tujuan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($transaksi as $pro): ?>
        <tr>
            <td><?php echo $i; ?>.</td>
            <td><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></td>
            <td><?php echo $pro['transaksi_kode']; ?></td>
            <td><?php echo $pro['user_nama']; ?></td>
            <td><?php echo number_format($pro['transaksi_total'],0,',','.'); ?></td>
            <td><?php echo $pro['transaksi_tujuan']; ?></td>
            <?php if($pro['transaksi_status'] == 'belum') { ?>
                <td style="background-color: red;color: white;">Belum</td>
            <?php }else if($pro['transaksi_status'] == 'dibayar') { ?>
                <td style="background-color: yellow;">Dibayar</td>
            <?php }else { ?>
                <td style="background-color: green;color: white;">Diproses</td>
            <?php } ?>
        </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>