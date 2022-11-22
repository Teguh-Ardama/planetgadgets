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
      <th>Nama Item</th>
      <th>Harga Awal / Harga Diskon</th>
      <th>Stok</th>
      <th>Diskon</th>
      <th>Foto</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach($produk as $pro): ?>
        <?php if($pro['produk_diskon']) { ?>
            <tr style="background-color: #ccf2ff;">
                <td><?php echo $i; ?>.</td>
                <td><?php echo $pro['produk_name']; ?></td>
                <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td>
                <td><?php echo $pro['produk_stok']; ?></td>
                <td><?php echo $pro['produk_diskon']; ?> %</td>
                <td><i>Terlampir</i></td>
            </tr>
        <?php }else { ?>
            <tr>
                <td><?php echo $i; ?>.</td>
                <td><?php echo $pro['produk_name']; ?></td>
                <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td>
                <td><?php echo $pro['produk_stok']; ?></td>
                <td><?php echo $pro['produk_diskon']; ?> %</td>
                <td><i>Terlampir</i></td>
            </tr>
        <?php } ?>
    <?php $i++; ?>
    <?php endforeach; ?>
  </tbody>
</table>