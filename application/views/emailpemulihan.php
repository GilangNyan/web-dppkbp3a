<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h4 class="font-weight-bold">Konfirmasi Pemulihan Akun</h4>
    <p class="text-justify">Email ini anda terima karena sebelumnya anda telah melakukan permintaan reset password. Silahkan klik tombol di bawah ini untuk reset password akun anda. Tetapi jika ini bukan anda, abaikan email ini.</p>
    <a class="btn btn-primary" href="<?= $link ?>">Reset Password</a>
    <p class="text-justify">Atau klik link di bawah ini.</p>
    <div class="alert alert-primary" role="alert">
        <a href="<?= $link ?>" class="text-decoration-none text-break"><?= $link ?></a>
    </div>
    <br>
    <br>
    <p class="text-muted">- Team Pengembang Aplikasi DPPKBP3A</p>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>