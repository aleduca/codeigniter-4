<?= $this->extend('layout') ?>

<?= $this->section('css') ?>
    <style>
      body{
        background-color: red;
      }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <h1>Home</h1>
<?= $this->endSection() ?>