<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>"/>
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

<h2 style="text-align: center;"><?php echo $title; ?></h2>

<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>No</th>
      <th>Nama Item</th>
      <th>Harga Awal / Harga Diskon</th>
      <th>Stok</th>
      <th>Diskon</th>
      <th>Foto</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach($produk as $pro): ?>
        <?php if($pro['produk_diskon']) { ?>
            <tr style="background-color: #ccf2ff;">
                <td><?php echo $i; ?>.</td>
                <td><?php echo $pro['produk_name']; ?></td>
                <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td>
                <td><?php echo $pro['produk_stok']; ?></td>
                <td><?php echo $pro['produk_diskon']; ?> %</td>
                <td><img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_image']; ?>"></td>
            </tr>
        <?php }else { ?>
            <tr>
                <td><?php echo $i; ?>.</td>
                <td><?php echo $pro['produk_name']; ?></td>
                <td><?php echo number_format($pro['produk_price'],0,',','.'); ?> / <?php echo number_format($pro['produk_price_diskon'],0,',','.'); ?></td>
                <td><?php echo $pro['produk_stok']; ?></td>
                <td><?php echo $pro['produk_diskon']; ?> %</td>
                <td><img src="wp-content/img/product/<?php echo $pro['produk_image']; ?>" width="40" alt="<?php echo $pro['produk_image']; ?>"></td>
            </tr>
        <?php } ?>
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
