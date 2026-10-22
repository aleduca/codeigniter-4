<article class="px-6 py-5 bg-indigo-950/30 border border-indigo-700/40 rounded-lg"
         id="post-row-<?= $post->id ?>">
    <form
        hx-patch="<?= url_to('posts.quick-update', $post->id) ?>"
        hx-target="#post-row-<?= $post->id ?>"
        hx-swap="outerHTML"
        class="flex flex-col gap-4"
    >
        <?= csrf_field() ?>

        <!-- Title -->
        <div>
            <label for="title-<?= $post->id ?>" class="mb-1 block text-xs font-medium text-zinc-400">
                Título
            </label>
            <input
                type="text"
                id="title-<?= $post->id ?>"
                name="title"
                value="<?= esc($post->title) ?>"
                required
                class="w-full rounded-lg border border-indigo-700/50 bg-zinc-950 px-3 py-2 text-sm text-white placeholder-zinc-600 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
            >
        </div>

        <!-- Content -->
        <div>
            <label for="content-<?= $post->id ?>" class="mb-1 block text-xs font-medium text-zinc-400">
                Conteúdo
            </label>
            <textarea
                id="content-<?= $post->id ?>"
                name="content"
                rows="5"
                required
                class="w-full rounded-lg border border-indigo-700/50 bg-zinc-950 px-3 py-2 text-sm text-white placeholder-zinc-600 outline-none transition focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500"
            ><?= esc($post->content) ?></textarea>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-3">
            <button
                type="submit"
                class="rounded bg-emerald-700 px-3 py-1.5 text-xs font-medium text-white transition hover:bg-emerald-600 cursor-pointer"
            >
                Salvar
            </button>

            <button
                type="button"
                hx-get="<?= url_to('posts.row', $post->id) ?>"
                hx-target="#post-row-<?= $post->id ?>"
                hx-swap="outerHTML"
                class="rounded border border-zinc-700 bg-zinc-800 px-3 py-1.5 text-xs font-medium text-zinc-300 transition hover:bg-zinc-700 hover:text-white cursor-pointer"
            >
                Cancelar
            </button>
        </div>
    </form>
</article>
