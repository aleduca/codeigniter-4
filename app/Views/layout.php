<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'CodeIgniter 4' ?></title>

    <!-- Tailwind CSS -->
   <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
</head>

<body class="min-h-screen bg-zinc-950 text-zinc-100">

    <div class="flex min-h-screen flex-col">

        <!-- =========================================
             HEADER
        ========================================== -->
     <?= $this->include('partials/header') ?>


     <!-- =========================================
     BODY
     ========================================== -->
     <div class="flex flex-1">


       <!-- =====================================
       SIDEBAR
       ====================================== -->
       <?= $this->include('partials/sidebar') ?>


            <!-- =====================================
                 MAIN CONTENT
            ====================================== -->
            <main class="flex-1 overflow-y-auto bg-zinc-950">

                <div class="mx-auto max-w-7xl p-6 lg:p-8">
                    <?= $this->renderSection('content') ?>
                </div>

            </main>

        </div>


        <!-- =========================================
             FOOTER
        ========================================== -->
        <?= $this->include('partials/footer') ?>

    </div>

</body>

</html>
