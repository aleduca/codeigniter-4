<article class="px-6 py-5 transition hover:bg-gray-800/50"
         id="post-row-<?= $post->id ?>">
    <div class="flex flex-col gap-2">
        <div class="flex items-start justify-between gap-4">
            <div class="flex items-center gap-3">
                <h3 class="text-base font-semibold text-white hover:text-indigo-400 transition">
                    <?= esc($post->title) ?>
                </h3>

                <!-- Botão Edição Rápida -->
                <button
                    type="button"
                    hx-get="<?= url_to('posts.quick-edit', $post->id) ?>"
                    hx-target="#post-row-<?= $post->id ?>"
                    hx-swap="outerHTML"
                    class="rounded bg-indigo-700 px-2.5 py-1 text-xs font-medium text-white transition hover:bg-indigo-600 cursor-pointer"
                >
                    Edição Rápida
                </button>

                <!-- Botão Deletar -->
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
