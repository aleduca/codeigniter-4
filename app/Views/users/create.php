<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-zinc-950 px-6 py-12 text-white">

    <div class="mx-auto w-full max-w-lg">

        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold tracking-tight">
                Criar usuário
            </h1>

            <p class="mt-2 text-sm text-gray-500">
                Preencha os dados abaixo para cadastrar um novo usuário.
            </p>
        </div>

        <div class="rounded-xl border border-gray-800 bg-zinc-900 p-8">

            <div class="mb-3">
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

            <form action="<?= url_to('users.store') ?>" method="POST" class="space-y-5">

                <!-- Firstname -->
                <div>
                    <label
                        for="firstname"
                        class="mb-2 block text-sm font-medium text-gray-300"
                    >
                        Firstname
                    </label>

                    <input
                        type="text"
                        id="firstname"
                        name="firstName"
                        value="<?= old('firstName', 'Alexandre') ?>"
                        placeholder="Digite o primeiro nome"
                        class="w-full rounded-lg border border-gray-800 bg-zinc-950 px-4 py-3 text-sm text-white placeholder-gray-600 outline-none transition focus:border-gray-600 focus:ring-1 focus:ring-gray-600"
                    >
                </div>

                <!-- Lastname -->
                <div>
                    <label
                        for="lastname"
                        class="mb-2 block text-sm font-medium text-gray-300"
                    >
                        Lastname
                    </label>

                    <input
                        type="text"
                        id="lastname"
                        name="lastName"
                        value="<?= old('lastName', 'Cardoso') ?>"
                        placeholder="Digite o sobrenome"
                        class="w-full rounded-lg border border-gray-800 bg-zinc-950 px-4 py-3 text-sm text-white placeholder-gray-600 outline-none transition focus:border-gray-600 focus:ring-1 focus:ring-gray-600"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label
                        for="email"
                        class="mb-2 block text-sm font-medium text-gray-300"
                    >
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= old('email', 'email@email.com') ?>"
                        placeholder="Digite o e-mail"
                        class="w-full rounded-lg border border-gray-800 bg-zinc-950 px-4 py-3 text-sm text-white placeholder-gray-600 outline-none transition focus:border-gray-600 focus:ring-1 focus:ring-gray-600"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label
                        for="password"
                        class="mb-2 block text-sm font-medium text-gray-300"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        value="123"
                        placeholder="Digite a senha"
                        class="w-full rounded-lg border border-gray-800 bg-zinc-950 px-4 py-3 text-sm text-white placeholder-gray-600 outline-none transition focus:border-gray-600 focus:ring-1 focus:ring-gray-600"
                    >
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full rounded-lg bg-indigo-700 px-4 py-3 text-sm font-semibold text-white transition hover:bg-zinc-800 focus:ring-offset-zinc-900 cursor-pointer"
                >
                    Cadastrar usuário
                </button>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
