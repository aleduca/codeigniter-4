<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(2);
?>

<nav aria-label="<?= esc(lang('Pager.pageNavigation')) ?>">
    <ul class="flex items-center justify-center gap-2 px-6 py-4">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= esc($pager->getFirst()) ?>" aria-label="<?= esc(lang('Pager.first')) ?>" class="inline-flex items-center justify-center rounded border border-gray-800 px-3 py-2 text-sm font-medium text-gray-300 transition hover:bg-zinc-800 hover:text-white">
                    <span aria-hidden="true"><?= esc(lang('Pager.first')) ?></span>
                </a>
            </li>
            <li>
                <a href="<?= esc($pager->getPrevious()) ?>" aria-label="<?= esc(lang('Pager.previous')) ?>" class="inline-flex items-center justify-center rounded border border-gray-800 px-3 py-2 text-sm font-medium text-gray-300 transition hover:bg-zinc-800 hover:text-white">
                    <span aria-hidden="true"><?= esc(lang('Pager.previous')) ?></span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= esc($link['uri']) ?>" <?= $link['active'] ? 'aria-current="page"' : '' ?> class="inline-flex items-center justify-center rounded border border-gray-800 px-3 py-2 text-sm font-medium transition <?= $link['active'] ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-zinc-800 hover:text-white' ?>">
                    <?= esc($link['title']) ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= esc($pager->getNext()) ?>" aria-label="<?= esc(lang('Pager.next')) ?>" class="inline-flex items-center justify-center rounded border border-gray-800 px-3 py-2 text-sm font-medium text-gray-300 transition hover:bg-zinc-800 hover:text-white">
                    <span aria-hidden="true"><?= esc(lang('Pager.next')) ?></span>
                </a>
            </li>
            <li>
                <a href="<?= esc($pager->getLast()) ?>" aria-label="<?= esc(lang('Pager.last')) ?>" class="inline-flex items-center justify-center rounded border border-gray-800 px-3 py-2 text-sm font-medium text-gray-300 transition hover:bg-zinc-800 hover:text-white">
                    <span aria-hidden="true"><?= esc(lang('Pager.last')) ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>