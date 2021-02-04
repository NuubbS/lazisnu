			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Dashboard</h1>
					</div>
					<div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="card card-statistic-1">
											<div class="card-icon bg-primary">
												<i class="fas fa-users"></i>
											</div>
											<div class="card-wrap">
												<div class="card-header">
													<h4>MUSTAHIQ</h4>
												</div>
												<div class="card-body">
													10
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="card card-statistic-1">
											<div class="card-icon bg-info">
												<i class="fas fa-donate"></i>
											</div>
											<div class="card-wrap">
												<div class="card-header">
													<h4>MUNFIQ</h4>
												</div>
												<div class="card-body">
													100
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="card card-statistic-1">
											<div class="card-icon bg-success">
												<i class="fas fa-hand-holding-usd"></i>
											</div>
											<div class="card-wrap">
												<div class="card-header">
													<h4>Penghimpunan</h4>
												</div>
												<div class="card-body">
													Rp. 100.000.000
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12">
										<div class="card card-statistic-1">
											<div class="card-icon bg-warning">
												<i class="fas fa-hand-holding-heart"></i>
											</div>
											<div class="card-wrap">
												<div class="card-header">
													<h4>PENYALURAN</h4>
												</div>
												<div class="card-body">
													Rp. 100.000.000
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-header">
									<h4>Budget vs Sales</h4>
								</div>
								<div class="card-body">
									<canvas id="myChart" height="158"></canvas>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									<h4 class="d-inline">User baru-baru ini mendaftar !</h4>
									<!-- <div class="card-header-action">
										<a href="#" class="btn btn-primary">View Detail</a>
									</div> -->
								</div>
								<div class="card-body">
									<ul class="list-unstyled list-unstyled-border">
										<?php foreach ($user->result() as $key => $data) { ?>
											<li class="media">
												<img class="mr-3 rounded-circle" width="50" src="<?= base_url(); ?>assets/img/avatar/<?= $data->gambar; ?>" alt="avatar">
												<div class="media-body">
													<?php if ($data->status_id == 2) { ?>
														<div class="badge badge-pill badge-danger mb-1 float-right"><?= $data->status; ?></div>
													<?php } else { ?>
														<div class="badge badge-pill badge-success mb-1 float-right"><?= $data->status; ?></div>
													<?php } ?>
													<h6 class="media-title"><a href="#"><?= $data->nama; ?></a></h6>
													<div class="text-small text-muted"><?= $data->role; ?><div class="bullet"></div> <span class="text-primary"><?= $data->date_created; ?></span></div>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!--end row -->
					<!-- <div class="card card-warning">
						<div class="card-header">
							<h4>Authors</h4>
						</div>
						<div class="card-body pb-0">
							<div class="row">
								<?php
								foreach ($author->result() as $key => $data) { ?>
									<div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
										<div class="avatar-item">
											<img alt="image" src="<?= base_url() ?>assets/img/avatar/<?= $data->gambar ?>" class="img-fluid" data-toggle="tooltip" title="<?= $data->nama; ?>">
											<div class="avatar-badge" title="<?= $data->role; ?>" data-toggle="tooltip"><i class="fas fa-code"></i></div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div> -->
				</section>
			</div>
			<!-- main content -->