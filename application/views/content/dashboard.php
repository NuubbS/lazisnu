			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="card card-statistic-2">
								<div class="card-stats">
									<div class="card-stats-title">Lazisnu Statistics -
										<div class="dropdown d-inline">
											<a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
											<ul class="dropdown-menu dropdown-menu-sm">
												<li class="dropdown-title">Select Month</li>
												<li><a href="#" class="dropdown-item active">January</a></li>
												<li><a href="#" class="dropdown-item">February</a></li>
												<li><a href="#" class="dropdown-item">March</a></li>
												<li><a href="#" class="dropdown-item">April</a></li>
												<li><a href="#" class="dropdown-item">May</a></li>
												<li><a href="#" class="dropdown-item">June</a></li>
												<li><a href="#" class="dropdown-item">July</a></li>
												<li><a href="#" class="dropdown-item">August</a></li>
												<li><a href="#" class="dropdown-item">September</a></li>
												<li><a href="#" class="dropdown-item">October</a></li>
												<li><a href="#" class="dropdown-item">November</a></li>
												<li><a href="#" class="dropdown-item">December</a></li>
											</ul>
										</div>
									</div>
									<div class="card-stats-items">
										<div class="card-stats-item">
											<div class="card-stats-item-count">24</div>
											<div class="card-stats-item-label">Masuk</div>
										</div>
										<div class="card-stats-item">
											<div class="card-stats-item-count">12</div>
											<div class="card-stats-item-label">Keluar</div>
										</div>
										<div class="card-stats-item">
											<div class="card-stats-item-count">23</div>
											<div class="card-stats-item-label">Saldo</div>
										</div>
									</div>
								</div>
								<div class="card-icon shadow-primary bg-primary">
									<i class="fas fa-archive"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Saldo Sekarang</h4>
									</div>
									<div class="card-body">
										Rp. 90.000.000
									</div>
								</div>
							</div>
						</div>
						<!-- end col-lg-4 -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="card card-statistic-2">
								<div class="card-chart">
									<canvas id="balance-chart" height="80"></canvas>
								</div>
								<div class="card-icon shadow-primary bg-primary">
									<i class="fas fa-donate"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Infaq Masuk / hari</h4>
									</div>
									<div class="card-body">
										Rp. 5.000.000
									</div>
								</div>
							</div>
						</div>
						<!-- end col-lg-4 -->
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="card card-statistic-2">
								<div class="card-chart">
									<canvas id="sales-chart" height="80"></canvas>
								</div>
								<div class="card-icon shadow-primary bg-primary">
									<i class="fas fa-dollar-sign"></i>
								</div>
								<div class="card-wrap">
									<div class="card-header">
										<h4>Total Infaq Keluar / hari</h4>
									</div>
									<div class="card-body">
										Rp. 3.000.000
									</div>
								</div>
							</div>
						</div>
						<!-- end col-lg-4 -->
					</div>
					<!-- end row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4>Uang Keluar & Masuk</h4>
								</div>
								<div class="card-body">
									<canvas id="myChart" height="158"></canvas>
								</div>
							</div>
						</div>
					</div>
					<!--end row -->
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4>Daftar Penerima Infaq Terbaru</h4>
								</div>
								<div class="card-body p-0">
									<div class="table-responsive table-invoice">
										<table class="table table-striped">
											<tr>
												<th>Invoice ID</th>
												<th>Customer</th>
												<th>Status</th>
												<th>Due Date</th>
												<th>Action</th>
											</tr>
											<tr>
												<td><a href="#">INV-87239</a></td>
												<td class="font-weight-600">Kusnadi</td>
												<td>
													<div class="badge badge-warning">Unpaid</div>
												</td>
												<td>July 19, 2018</td>
												<td>
													<a href="#" class="btn btn-primary">Detail</a>
												</td>
											</tr>
											<tr>
												<td><a href="#">INV-48574</a></td>
												<td class="font-weight-600">Hasan Basri</td>
												<td>
													<div class="badge badge-success">Paid</div>
												</td>
												<td>July 21, 2018</td>
												<td>
													<a href="#" class="btn btn-primary">Detail</a>
												</td>
											</tr>
											<tr>
												<td><a href="#">INV-76824</a></td>
												<td class="font-weight-600">Muhamad Nuruzzaki</td>
												<td>
													<div class="badge badge-warning">Unpaid</div>
												</td>
												<td>July 22, 2018</td>
												<td>
													<a href="#" class="btn btn-primary">Detail</a>
												</td>
											</tr>
											<tr>
												<td><a href="#">INV-84990</a></td>
												<td class="font-weight-600">Agung Ardiansyah</td>
												<td>
													<div class="badge badge-warning">Unpaid</div>
												</td>
												<td>July 22, 2018</td>
												<td>
													<a href="#" class="btn btn-primary">Detail</a>
												</td>
											</tr>
											<tr>
												<td><a href="#">INV-87320</a></td>
												<td class="font-weight-600">Ardian Rahardiansyah</td>
												<td>
													<div class="badge badge-success">Paid</div>
												</td>
												<td>July 28, 2018</td>
												<td>
													<a href="#" class="btn btn-primary">Detail</a>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<!-- end card body -->
							</div>
							<!-- end card -->
						</div>
					</div>
					<!-- end row -->
					<div class="row">
						<div class="col-lg-6">
							<div class="card card-danger">
								<div class="card-header">
									<h4>Users</h4>
									<div class="card-header-action">
										<a href="#" class="btn btn-danger btn-icon icon-right">View All <i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
								<div class="card-body">
									<div class="owl-carousel owl-theme" id="users-carousel">
										<div>
											<div class="user-item">
												<img alt="image" src="<?= base_url() ?>assets/img/avatar/default.png" class="img-fluid">
												<div class="user-details">
													<div class="user-name">Arief Rahman Putera</div>
													<div class="text-job text-muted">Administrator</div>
													<div class="user-cta">
														<button class="btn btn-success follow-btn" data-follow-action="alert('user1 followed');" data-unfollow-action="alert('user1 unfollowed');"><i class="fab fa-whatsapp mr-2"></i>Chat</button>
													</div>
												</div>
											</div>
										</div>
										<div>
											<div class="user-item">
												<img alt="image" src="<?= base_url() ?>assets/img/avatar/avatar-2.png" class="img-fluid">
												<div class="user-details">
													<div class="user-name">M. Hamdan Yusuf</div>
													<div class="text-job text-muted">User</div>
													<div class="user-cta">
														<button class="btn btn-success follow-btn" data-follow-action="alert('user2 followed');" data-unfollow-action="alert('user2 unfollowed');"><i class="fab fa-whatsapp mr-2"></i>Chat</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- end owl-carousel -->
								</div>
								<!-- end card body -->
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card mt-4">
								<div class="card-header">
									<h4>Authors</h4>
								</div>
								<div class="card-body pb-0">
									<div class="row">
										<div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
											<div class="avatar-item">
												<img alt="image" src="<?= base_url() ?>assets/img/avatar/default.png" class="img-fluid" data-toggle="tooltip" title="Arief Rahman Putera">
												<div class="avatar-badge" title="Web Developer" data-toggle="tooltip"><i class="fas fa-wrench"></i></div>
											</div>
										</div>
										<div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
											<div class="avatar-item">
												<img alt="image" src="<?= base_url() ?>assets/img/avatar/avatar-2.png" class="img-fluid" data-toggle="tooltip" title="M. Hamdan Yusuf">
												<div class="avatar-badge" title="Web Developer" data-toggle="tooltip"><i class="fas fa-cog"></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end div col-lg-6 -->
					</div>
				</section>
			</div>
			<!-- main content -->