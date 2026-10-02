<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="p-6">

    <div class="mx-auto max-w-2xl overflow-hidden rounded-xl border border-gray-800 bg-zinc-900">

    <div class="mb-3 mt-4">
        <?php if ($success = session()->getFlashdata('success')): ?>
            <div class="mb-4 rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300 text-center">
                <?= esc($success) ?>
            </div>
        <?php endif; ?>

        <?php if ($error = session()->getFlashdata('error')): ?>
            <div class="mb-4 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300 text-center">
                <?= esc($error) ?>
            </div>
        <?php endif; ?>
    </div>

    <h2 class="text-3xl p-3 text-center mt-3">Lista de Users</h2>

    <div class="flex justify-end mr-3 mb-3">
        <!-- <a href="<?= url_to('users.create') ?>" class="bg-indigo-600 text-white p-2 rounded cursor-pointer">New User</a> -->
        <?= anchor(url_to('users.create'), 'New User', [
        	'class' => 'bg-indigo-600 text-white p-2 rounded cursor-pointer',
        ]) ?>
    </div>

    <div class="divide-y divide-gray-800">

    <?php foreach ($users as $user): ?>
        <div class="flex items-center justify-between px-6 py-5 transition hover:bg-gray-800/50">
            <span class="text-sm font-medium text-white">
                <?= $user->fullName ?> -
                <?= $user->email ?>
            </span>

            <span class="text-xs text-gray-500 flex">
                <a href="<?= url_to('users.edit', $user->id) ?>" class="bg-indigo-700 text-white p-2 rounded cursor-pointer mr-2">Edit</a>
                <form action="<?= url_to('users.delete', $user->id) ?>" method="post">
                       <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="bg-red-700 text-white p-2 rounded cursor-pointer">Delete</button>
                </form>
            </span>
        </div>
    <?php endforeach ?>

    </div>

</div>


</div>
<?= $this->endSection() ?>