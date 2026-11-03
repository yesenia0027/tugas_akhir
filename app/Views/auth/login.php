<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Estimasi Premi Kendaraan</title>
</head>

<body>

    <h2>Login Aplikasi Estimasi Premi Kendaraan</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <p style="color: red;">
            <?= esc(session()->getFlashdata('error')) ?>
        </p>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">

        <?= csrf_field() ?>

        <div>
            <label>Username</label>
            <input
                type="text"
                name="username"
                value="<?= old('username') ?>"
                required>
        </div>

        <br>

        <div>
            <label>Password</label>
            <input
                type="password"
                name="password"
                required>
        </div>

        <br>

        <button type="submit">Login</button>

    </form>

</body>

</html>