<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="p-6" x-data="{
    showModal: false,
    deleteUrl: '',
    postTitle: '',
    openModal(url, title) {
        this.deleteUrl = url;
        this.postTitle = title;
        this.showModal = true;
    },
    closeModal() {
        this.showModal = false;
        this.deleteUrl = '';
        this.postTitle = '';
    }
}">

    <div class="mx-auto max-w-4xl overflow-hidden rounded-xl border border-gray-800 bg-zinc-900">

        <div class="mb-3 mt-4 px-6">
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

        <h2 class="text-3xl p-3 text-center mt-3 font-bold text-white">Lista de Posts</h2>

        <div class="divide-y divide-gray-800">

            <?php if (empty($posts)): ?>
                <div class="px-6 py-10 text-center text-zinc-500">
                    Nenhum post encontrado.
                </div>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <article class="px-6 py-5 transition hover:bg-gray-800/50">
                        <div class="flex flex-col gap-2">
                            <div class="flex items-start justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <h3 class="text-base font-semibold text-white hover:text-indigo-400 transition">
                                        <?= esc($post->title) ?>
                                    </h3>

                                    <button
                                        type="button"
                                        @click="openModal('<?= url_to('posts.delete', $post->id) ?>', '<?= esc($post->title, 'js') ?>')"
                                        class="rounded bg-red-700 px-2.5 py-1 text-xs font-medium text-white transition hover:bg-red-600 cursor-pointer"
                                    >
                                        Deletar
                                    </button>
                                </div>

                                <?php if (!empty($post->slug)): ?>
                                    <span class="shrink-0 rounded bg-zinc-800 px-2 py-0.5 font-mono text-xs text-zinc-400">
                                        <?= esc($post->slug) ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="flex items-center gap-2 text-xs text-zinc-400">
                                <span>Por <strong class="text-zinc-200"><?= esc($post->author) ?></strong></span>
                                <span>&bull;</span>
                                <time datetime="<?= esc($post->created_at) ?>">
                                    <?= date('d/m/Y H:i', strtotime($post->created_at)) ?>
                                </time>
                            </div>

                            <p class="mt-1 text-sm text-zinc-400">
                                <?= esc($post->excerpt) ?>
                            </p>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="p-4">

            </div>

        </div>

    </div>

    <!-- Modal de Confirmação com Alpine.js e TailwindCSS -->
    <div
        x-show="showModal"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-xs"
        @keydown.escape.window="closeModal()"
        style="display: none;"
    >
        <!-- Backdrop para fechar ao clicar fora -->
        <div class="fixed inset-0" @click="closeModal()"></div>

        <!-- Conteúdo do Modal -->
        <div
            x-show="showModal"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative w-full max-w-md overflow-hidden rounded-xl border border-gray-800 bg-zinc-900 p-6 shadow-2xl"
            @click.stop
        >
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-500/10 text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-white">Confirmar exclusão</h3>
                    <p class="text-sm text-zinc-400">Esta ação não pode ser desfeita.</p>
                </div>
            </div>

            <p class="mt-4 text-sm text-zinc-300">
                Tem certeza de que deseja deletar o post <strong class="text-white" x-text="postTitle"></strong>?
            </p>

            <div class="mt-6 flex justify-end gap-3">
                <button
                    type="button"
                    @click="closeModal()"
                    class="rounded-lg border border-gray-700 bg-zinc-800 px-4 py-2 text-sm font-medium text-zinc-300 transition hover:bg-zinc-700 hover:text-white cursor-pointer"
                >
                    Cancelar
                </button>

                <form :action="deleteUrl" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button
                        type="submit"
                        class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-500 cursor-pointer"
                    >
                        Sim, deletar
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
