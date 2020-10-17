<!-- start footer Area -->

<footer class="footer-area section_gap">

	<div class="container">

		<div class="row">

			<div class="col-lg-3  col-md-6 col-sm-12">

				<div class="single-footer-widget">

					<h6>Tentang Kami</h6>
					<p>
						Dropship sistem pertama di Indonesia khususnya di bidang fashion
					</p>

				</div>

			</div>

			<div class="col-lg-4  col-md-6 col-sm-0">

            	<div class="single-footer-widget">

					<h6>Kontak Kami</h6>
					<p>
					    <adress>
						Dropshipyuk.com<br>
						Jl Bantul Gedongkiwo - Mantrijeron
						Kota Yoyakarta , DI Yogyakarta
						</adress><br>
						<a href="#"><i class="fa fa-phone"></i> 08123245275</a><br>
						<a href="#"><i class="fa fa-envelope"></i> dropshipyukofficial@gmail.com</a>
					</p>

				</div>

			</div>

			<div class="col-lg-3  col-md-6 col-sm-12">



			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">

				<div class="single-footer-widget">

					<h6>Cek juga</h6>

					<p>Sosial Media Kami</p>

					<div class="footer-social d-flex align-items-center">

						<a href="#"><i class="fa fa-facebook"></i></a>

						<a href="#"><i class="fa fa-twitter"></i></a>

						<a href="#"><i class="fa fa-dribbble"></i></a>

						<a href="#"><i class="fa fa-behance"></i></a>

					</div>

				</div>

			</div>

		</div>

		<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">

			<p class="footer-text m-0">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://dropshipyuk.com" target="_blank">Dropshipyuk.com</a>

				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</p>

		</div>

	</div>

</footer>

<!-- End footer Area -->



<script src="<?= base_url('vendor/karma/') ?>js/vendor/jquery-2.2.4.min.js"></script>


<script src="<?= base_url('vendor/karma/') ?>js/vendor/popper.min.js"></script>
<script src="<?= base_url('vendor/karma/') ?>js/vendor/bootstrap.min.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/jquery.ajaxchimp.min.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/jquery.nice-select.min.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/jquery.sticky.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/nouislider.min.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/countdown.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/jquery.magnific-popup.min.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/owl.carousel.min.js"></script>

<!--gmaps Js-->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script> -->

<script src="<?= base_url('vendor/karma/') ?>js/gmaps.min.js"></script>

<script src="<?= base_url('vendor/karma/') ?>js/main.js"></script>

<script>
	function keranjang() {
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url() ?>penjualan/keranjangdetail',
			dataType: 'json',
			success: function(response) {

				if (response.datarows != '') {
					var viewtotal = '<table class="table table-image">';
					var totalharusdibayar, totalharusdibayarInt, TotalKuantiti, TotalBelanja;
					$.each(response.datarows, function(i, item) {
						totalharusdibayar = item.total;
						totalharusdibayarInt = item.totalInt;
						TotalKuantiti = item.totalKuantiti;
						TotalBelanja = item.total;
					});
					$('#TotalBelanja').html(TotalBelanja);

					// $('#TotalBelanjaInt').val(totalharusdibayarInt);
				} else {
					$('#TotalBelanja').html('Rp 0');
				}
				if (response.datasub != '') {
					var datarow = '<table class="table table-image">';
					datarow += '<thead><tr><th scope="col"></th><th scope="col">Product</th><th scope="col">Price</th><th scope="col">Qty</th><th scope="col">Total</th><th scope="col">Actions</th></tr></thead>';
					$.each(response.datasub, function(i, itemsub) {
						datarow += '<tr>';
						datarow += '<td class="w-25"><img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" class="img-fluid img-thumbnail" alt="Sheep"></td>';
						datarow += '<td>' + itemsub.nama_item + '</td>';
						datarow += '<td>' + itemsub.kuantiti + '</td>';
						datarow += '<td>' + itemsub.harga + '</td>';
						datarow += '<td>' + itemsub.total + '</td>';
						datarow += '<td><a class="btn btn-danger btn-xs"  onclick="hapus(this)" data-kode="' + itemsub.id + '" ><i class="fa fa-trash-o"></i></a></td>';
						datarow += '</tr>';
						idk = itemsub.id_keranjang;
						idkd = itemsub.id;
					});
					datarow += '</table>';
					$('#Keranjang').html(datarow);
				} else {

					var datarow = '<table class="table table-image">';
					datarow += '<thead><tr><th scope="col"></th><th scope="col">Product</th><th scope="col">Price</th><th scope="col">Qty</th><th scope="col">Total</th><th scope="col">Actions</th></tr></thead>';
					$('#Keranjang').html(datarow);
				}
			}
		});
		$('#modalkeranjang').modal('show');
	}
</script>
</body>



</html>