<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="p-6">
    <div class="mx-auto max-w-2xl overflow-hidden rounded-xl border border-gray-800 bg-zinc-900">

    <h2 class="text-3xl p-3 text-center mt-3">Lista de Users</h2>

    <div class="flex justify-end mr-3 mb-3">
        <a href="<?= url_to('users.create') ?>" class="bg-indigo-600 text-white p-2 rounded cursor-pointer">New User</a>
    </div>

    <div class="divide-y divide-gray-800">

    <?php foreach ($users as $user): ?>
        <div class="flex items-center justify-between px-6 py-5 transition hover:bg-gray-800/50">
            <span class="text-sm font-medium text-white">
                <?= $user->fullName ?> -
                <?= $user->email ?>
            </span>

            <span class="text-xs text-gray-500">
                <?= $user->id ?>
            </span>
        </div>
    <?php endforeach ?>

    </div>

</div>


</div>
<?= $this->endSection() ?>