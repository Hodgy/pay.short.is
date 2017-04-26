<?php $paymentValue = round(substr(strtok($_SERVER["REQUEST_URI"],'?'), 1), 2); ?>
<?php $displayValue = '£' . number_format($paymentValue, 2, '.', ''); ?>
<?php ($paymentValue < 100.01) ?: header('Location: https://paypal.me/tdchodgy/' . $paymentValue); ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Send James Hodgson <?php echo ($paymentValue < 0) ?: $displayValue; ?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <h1>Send James <?php echo ($paymentValue < 0) ?: $displayValue; ?></h1>
    <div class="providers">
      <a class="providers__item" href="https://paypal.me/tdchodgy/<?= $paymentValue; ?>">
        <img class="providers__icon" src="img/paypal.svg">
      </a>
      <a class="providers__item" href="https://monzo.me/jameshdogson/<?= $paymentValue; ?>">
        <img class="providers__icon" src="img/monzo.svg">
      </a>
    </div>
  </body>
</html>
