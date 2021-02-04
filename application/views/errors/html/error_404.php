<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
$ci = new CI_Controller();
$ci = &get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>404 &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome/css/all.min.css">

	<!-- CSS Libraries -->

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
</head>

<body>
	<div id="app">
		<section class="section">
			<div class="container mt-5">
				<div class="page-error">
					<div class="page-inner">
						<h1>404</h1>
						<div class="page-description">
							The page you were looking for could not be found.
						</div>
						<div class="page-search">
							<div class="mt-3">
								<a href="<?= base_url(''); ?>" class="btn btn-icon icon-left btn-primary"><i class="fas fa-fire"></i> Back to Dashboard</a>
							</div>
						</div>
					</div>
				</div>
				<div class="simple-footer mt-5">
					Copyright &copy; 2020 - <?= date('Y') ?> <div class="bullet"></div> Created By <a href="#">Arief Rahman Putera</a> & <a href="#">M. Hamdan Yusuf</a>
				</div>
			</div>
		</section>
	</div>

	<!-- General JS Scripts -->
	<script src="<?= base_url('assets/plugins/jquery/jquery-3.5.1.min.js'); ?>"></script>
	<script src="<?= base_url(''); ?>assets/plugins/popper.js"></script>
	<script src="<?= base_url('assets/plugins/jquery/jquery.nicescroll.min.js'); ?>"></script>
	<script src="<?= base_url('assets/plugins/jquery/moment.js'); ?>"></script>
	<script src="<?= base_url() ?>assets/js/stisla.js"></script>

	<!-- JS Libraies -->

	<!-- Template JS File -->
	<script src="<?= base_url() ?>assets/js/scripts.js"></script>
	<script src="<?= base_url() ?>assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
</body>

</html>
<!-- 
<div id="container">
	<h1><?php echo $heading; ?></h1>
	<?php echo $message; ?>
</div> -->