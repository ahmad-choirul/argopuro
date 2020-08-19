<!-- ============================================================== -->

<!-- End Container fluid  -->

<!-- ============================================================== -->

<!-- ============================================================== -->

<!-- footer -->

<!-- ============================================================== -->

<footer class="footer"> © 2020 Kreatindo.com </footer>

<!-- ============================================================== -->

<!-- End footer -->

<!-- ============================================================== -->

</div>

<!-- ============================================================== -->

<!-- End Page wrapper  -->

<!-- ============================================================== -->

</div>

<!-- ============================================================== -->

<!-- End Wrapper -->

<!-- ============================================================== -->

<!-- ============================================================== -->

<!-- All Jquery -->

<!-- ============================================================== -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>


<script src="<?= base_url('vendor/assetsReseller/theme.init.js') ?>"></script>


<!-- Bootstrap tether Core JavaScript -->

<script src="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/bootstrap/js/tether.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->

<script src="<?= base_url('vendor/assetsReseller/') ?>js/jquery.slimscroll.js"></script>

<!--Wave Effects -->

<script src="<?= base_url('vendor/assetsReseller/') ?>js/waves.js"></script>

<!--Menu sidebar -->

<script src="<?= base_url('vendor/assetsReseller/') ?>js/sidebarmenu.js"></script>

<!--stickey kit -->

<script src="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>

<!--Custom JavaScript -->

<script src="<?= base_url('vendor/assetsReseller/') ?>js/custom.min.js"></script>
<script src="<?= base_url('vendor/assetsReseller/') ?>js/moment.min.js"></script>
<script src="<?= base_url('vendor/assetsReseller/') ?>js/daterangepicker.js"></script>

<!-- ============================================================== -->

<!-- This page plugins -->

<!-- ============================================================== -->

<!-- chartist chart -->

<!-- <script src="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/chartist-js/dist/chartist.min.js"></script>

<script src="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script> -->

<!--c3 JavaScript -->

<script src="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/d3/d3.min.js"></script>

<script src="<?= base_url('vendor/assetsReseller/') ?>assets/plugins/c3-master/c3.min.js"></script>

<!-- Chart JS -->

<script src="<?php echo base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/select2/dist/js/select2.full.min.js"></script>
<!-- page script -->
<script>
	$(function () { 
		$('.select2').select2()
	})
</script>
<script type="text/javascript">
	$('.tanggal').datepicker({
		format: 'yyyy-mm-dd'
	});
</script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
<script type="text/javascript">
	$(function() {
		$('.tanggal').daterangepicker({
			startDate: new Date(),
			"singleDatePicker": true,
			"showWeekNumbers": true,
			"showISOWeekNumbers": true,
			"timePicker": true,
			"timePicker24Hour": true,
			"timePickerSeconds": true,
			locale: {
				format: 'YYYY-MM-DD H:mm:ss'
			},
			"drops": "auto"
		});
	});
</script>
</body>



</html>

