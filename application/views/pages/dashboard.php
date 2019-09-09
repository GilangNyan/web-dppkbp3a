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
				<div class="col-12 col-sm-12 col-md-6">
					<!-- Performa Artikel -->
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fas fa-industry mr-1"></i>
								Profil Dinas
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool pt-2" data-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<table class="table table-borderless">
									<tr>
										<th class="text-right">Nama Dinas :</th>
										<td><?= $profil['dinas'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Kepala Dinas :</th>
										<td><?= $profil['kepala'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Alamat Dinas :</th>
										<td><?= $profil['alamat'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Kelurahan/Desa :</th>
										<td><?= $profil['desa'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Kecamatan :</th>
										<td><?= $profil['kecamatan'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Kabupaten/Kota :</th>
										<td><?= $profil['kabupaten'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Provinsi :</th>
										<td><?= $profil['provinsi'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Telepon :</th>
										<td><?= $profil['telepon'] ?></td>
									</tr>
									<tr>
										<th class="text-right">Kode Pos :</th>
										<td><?= $profil['kodepos'] ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<!-- /.Performa Artikel -->
					<!-- Informasi Situs -->
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="far fa-window-restore mr-1"></i>
								Informasi Situs
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool pt-2" data-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<table class="table table-borderless">
									<tr>
										<th class="text-right">Sistem Operasi</th>
										<td><?= $this->agent->platform(); ?></td>
									</tr>
									<tr>
										<th class="text-right">Browser</th>
										<td><?= $this->agent->browser(); ?></td>
									</tr>
									<tr>
										<th class="text-right">Versi PHP</th>
										<td><?= phpversion() ?></td>
									</tr>
									<tr>
										<?php
										$this->load->database();
										$hostname = $this->db->hostname;
										$username = $this->db->username;
										$password = $this->db->password;
										$mysqli = new mysqli($hostname, $username, $password) ?>
										<th class="text-right">Versi Database</th>
										<td><?= $mysqli->server_info ?></td>
									</tr>
									<tr>
										<th class="text-right">Tanggal Server</th>
										<td><?= date('l, d F Y', time()) ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<!-- /.Performa Artikel -->
				</div>

				<div class="col-12 col-sm-12 col-md-6">
					<!-- Performa Artikel -->
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fas fa-file mr-1"></i>
								Tayangan Artikel
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool pt-2" data-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
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
												<?php
													$pisah1 = explode("-", $row->tanggal);
													$tahun = $pisah1[0];
													$bulan = $pisah1[1];
													?>
												<td><a class="text-reset" href="<?= base_url() . $tahun . '/' . $bulan . '/' . $row->slug ?>" target="_blank"><?= $row->judul ?></a></td>
												<td><?= $row->views ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /.Performa Artikel -->
					<!-- Penggunaan Browser -->
					<div class="card">
						<div class="card-header d-flex p-0">
							<h3 class="card-title p-3">
								<i class="fab fa-chrome mr-1"></i>
								Penggunaan Browser
							</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool pt-2" data-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="tab-content p-0">
								<canvas id="browserchart"></canvas>
							</div>
						</div>
					</div>
					<!-- /.Penggunaan Browser -->
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->