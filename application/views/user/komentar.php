<!-- Page item Area -->
		<div id="page_item_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 text-left">
						<h3><?php echo $title; ?></h3>
					</div>		

					<div class="col-sm-6 text-right">
						<ul class="p_items">
							<li><a href="<?php echo base_url(); ?>">home</a></li>
							<li><span><?php echo $title; ?></span></li>
						</ul>					
					</div>	
				</div>
			</div>
		</div>
		
		<!-- Cart Page -->
		<div class="cart_page_area">
			<div class="container">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash'); ?>"></div>
				<div class="cart-actions cart-button-cuppon">
					<div class="cuppon-wrap text-center">
						<h3>Riwayat Komentar Anda</h3>
						<div class="table-responsive mt-5">
						  <table class="table table-sm">
						    <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Tanggal</th>
							      <th scope="col">Produk</th>
							      <th scope="col">Komentar</th>
							      <th scope="col">Hapus</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php if(count($komentar) == 0) { ?>
							  		<tr>
							  			<td colspan="5">Anda belum pernah berkomentar apapun</td>
							  		</tr>
							  	<?php }else { ?>
							  		<?php $i = 1; ?>
								  	<?php foreach($komentar as $komen): ?>
								    <tr>
								      <th scope="row"><?php echo $i.'.'; ?></th>
								      <td><?php echo date('d-m-Y H:i:s', strtotime($komen['komentar_tgl'])); ?></td>
								      <td><?php echo $komen['produk_name']; ?></td>
								      <td><?php echo $komen['komentar_isi']; ?></td>
								      <td><a href="<?php echo base_url(); ?>user/delete_komentar/<?php echo $komen['komentar_id']; ?>" class="btn btn-default"><i class="fa fa-trash"></i></a></td>
								    </tr>
								    <?php $i++; ?>
									<?php endforeach; ?>
							  	<?php } ?>
							  </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
