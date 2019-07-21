<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<?php $this->load->view('templates/_partials/contentheader') ?>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-friends"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Pengunjung Hari Ini</span>
							<span class="info-box-number"><?= $todayvisitor ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-check"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Pengunjung Online</span>
							<span class="info-box-number"><?= $onlinevisitor ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Total Pengunjung</span>
							<span class="info-box-number"><?= $totalvisitor ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-paper-plane"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Artikel Diterbitkan</span>
							<span class="info-box-number"><?= $totalpages ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
			<div class="row">
				<!-- Performa Artikel -->
				<div class="col-12 col-sm-12 col-md-8">
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fas fa-file mr-1"></i>
								Performa Artikel
							</h3>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<table class="table table-hover">
									<thead>
										<tr>
											<th style="width: 70%">Entri</th>
											<th>Penayangan</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($postperf as $row) : ?>
											<tr>
												<td><?= $row->judul ?></td>
												<td><?= $row->views ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /.Performa Artikel -->
				<!-- Penggunaan Browser -->
				<div class="col-12 col-sm-12 col-md-4">
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fab fa-chrome mr-1"></i>
								Penggunaan Browser
							</h3>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<canvas id="browserchart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- /.Penggunaan Browser -->
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->