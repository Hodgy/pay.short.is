<?php $paymentValue = round(substr(strtok($_SERVER["REQUEST_URI"],'?'), 1), 2); ?>
<?php $displayValue = '£' . number_format($paymentValue, 2, '.', ''); ?>
<?php require_once './gateways.php'; ?>

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
        <?php foreach ($gateways as $gateway): ?>
            <?php if (is_null($gateway['limit']) || $paymentValue <= $gateway['limit']): ?>
                <a class="providers__item" href="<?= $gateway['url'] . $paymentValue; ?>">
                    <img class="providers__icon" src="<?= $gateway['logo']; ?>">
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
  </body>
</html>