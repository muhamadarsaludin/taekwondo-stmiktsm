<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $subject; ?></title>
</head>

<body>
  <h1>Hello, <?= $name; ?>!</h1>
  <p>Your account has been activated. Click link bellow to access your account:</p>
  <p><a href="<?= base_url(); ?>/login">Login to Website</a></p>
  <p>
    Thanks, <br>
    Taekwondo x Codetarian
  </p>
</body>

</html>