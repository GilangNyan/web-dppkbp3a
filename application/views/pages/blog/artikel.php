<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_NAME ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/artikel.css') ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($data as $row) :
                    $pisah1 = explode("-", $row->tanggal);
                    $tahun = $pisah1[0];
                    $bulan = $pisah1[1];
                    $sisa1 = $pisah1[2];
                    $pisah2 = explode(" ", $sisa1);
                    $tanggal = $pisah2[0];
                    switch ($bulan) {
                        case "01":
                            $nbulan = "Januari";
                            break;
                        case "02":
                            $nbulan = "Februari";
                            break;
                        case "03":
                            $nbulan = "Maret";
                            break;
                        case "04":
                            $nbulan = "April";
                            break;
                        case "05":
                            $nbulan = "Mei";
                            break;
                        case "06":
                            $nbulan = "Juni";
                            break;
                        case "07":
                            $nbulan = "Juli";
                            break;
                        case "08":
                            $nbulan = "Agustus";
                            break;
                        case "09":
                            $nbulan = "September";
                            break;
                        case "10":
                            $nbulan = "Oktober";
                            break;
                        case "11":
                            $nbulan = "November";
                            break;
                        case "12":
                            $nbulan = "Desember";
                            break;
                    }
                    ?>
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/img/') . $row->image ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="text-reset" href="<?= base_url() . $tahun . '/' . $bulan . '/' . $row->slug ?>"><?= $row->judul ?></a></h5>
                                    <p class="card-text crop-text"><?= strip_tags($row->isi) ?></p>
                                    <p class="card-text"><small class="text-muted"><?= "Dipublikasikan pada $tanggal $nbulan $tahun oleh " . $row->nama ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php echo $this->pagination->create_links(); ?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>