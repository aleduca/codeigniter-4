<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h2>Home</h2>

    <div x-data="{ count: 0 }">
        <button x-on:click="count++">Increment</button>

        <span x-text="count"></span>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam voluptatem magnam nostrum quod, sapiente porro ut in, facilis dolorum animi dolor quae nesciunt molestias, blanditiis beatae accusamus molestiae nam iste.</p>

<?= $this->endSection() ?>