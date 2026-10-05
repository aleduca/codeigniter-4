<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-zinc-950 px-6 py-12 text-white">

    <div class="mx-auto flex min-h-[80vh] w-full max-w-md items-center justify-center">

        <div class="w-full">

            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold tracking-tight">
                    Login
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Entre com seus dados para acessar sua conta.
                </p>
            </div>

            <div class="rounded-xl border border-gray-800 bg-zinc-900 p-8">

            <?= redirected_with('error', 'mb-4 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300 text-center'); ?>

                <form action="<?= url_to('auth.store') ?>" method="POST" class="space-y-5">

                 <?= csrf_field() ?>

                    <!-- Email -->
                    <div>
                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-gray-300"
                        >
                            E-mail
                        </label>

                        <input
                            type="text"
                            id="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            autocomplete="email"
                            class="w-full rounded-lg border border-gray-800 bg-zinc-950 px-4 py-3 text-sm text-white placeholder-gray-600 outline-none transition focus:border-gray-600 focus:ring-1 focus:ring-gray-600"
                        >
                        <?= validate('email') ?>
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
                            placeholder="Digite sua senha"
                            autocomplete="current-password"
                            class="w-full rounded-lg border border-gray-800 bg-zinc-950 px-4 py-3 text-sm text-white placeholder-gray-600 outline-none transition focus:border-gray-600 focus:ring-1 focus:ring-gray-600"
                        >
                          <?= validate('password') ?>
                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-white px-4 py-3 text-sm font-semibold text-zinc-950 transition hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-zinc-900 cursor-pointer"
                    >
                        Entrar
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>