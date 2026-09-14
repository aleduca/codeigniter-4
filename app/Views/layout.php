<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'CodeIgniter 4' ?></title>
  <?= $this->renderSection('css') ?>
</head>
<body>
  <div>
    <?= $this->include('partials/header') ?>
    <?= $this->include('partials/sidebar') ?>

    <div>
      <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('partials/footer') ?>
  </div>
</body>
</html>