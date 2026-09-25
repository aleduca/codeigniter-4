<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-zinc-950 text-zinc-100">

    <div class="flex min-h-screen flex-col">

        <!-- =========================================
             HEADER
        ========================================== -->
        <header class="h-16 shrink-0 border-b border-zinc-800 bg-zinc-900">

            <div class="flex h-full items-center justify-between px-6">

                <!-- Logo -->
                <div class="flex items-center gap-3">

                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 font-bold">
                        A
                    </div>

                    <span class="text-lg font-semibold tracking-tight">
                        Admin
                    </span>

                </div>


                <!-- Header right -->
                <div class="flex items-center gap-4">

                    <!-- Notification -->
                    <button
                        type="button"
                        class="relative rounded-lg p-2 text-zinc-400 transition hover:bg-zinc-800 hover:text-white"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            />
                        </svg>

                        <span class="absolute right-1 top-1 h-2 w-2 rounded-full bg-indigo-500"></span>
                    </button>


                    <!-- User -->
                    <div class="flex items-center gap-3">

                        <div class="hidden text-right sm:block">
                            <p class="text-sm font-medium text-zinc-100">
                                Alexandre
                            </p>

                            <p class="text-xs text-zinc-500">
                                Administrador
                            </p>
                        </div>

                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-zinc-700 text-sm font-semibold">
                            AC
                        </div>

                    </div>

                </div>

            </div>

        </header>


        <!-- =========================================
             BODY
        ========================================== -->
        <div class="flex flex-1">


            <!-- =====================================
                 SIDEBAR
            ====================================== -->
            <aside class="hidden w-64 shrink-0 border-r border-zinc-800 bg-zinc-900 lg:block">

                <nav class="flex h-full flex-col p-4">

                    <!-- Menu -->
                    <div>

                        <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Menu
                        </p>


                        <div class="space-y-1">

                            <!-- Dashboard -->
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg bg-indigo-600/10 px-3 py-2.5 text-sm font-medium text-indigo-400"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 12l9-9 9 9M5 10v10h14V10"
                                    />
                                </svg>

                                Dashboard

                            </a>


                            <!-- Projetos -->
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-zinc-400 transition hover:bg-zinc-800 hover:text-zinc-100"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0H4"
                                    />
                                </svg>

                                Projetos

                            </a>


                            <!-- Usuários -->
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-zinc-400 transition hover:bg-zinc-800 hover:text-zinc-100"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M17 20h5v-2a4 4 0 00-4-4h-1m-4 6H3v-2a4 4 0 014-4h4a4 4 0 014 4v2zm-2-10a4 4 0 11-8 0 4 4 0 018 0zm7-1a3 3 0 10-6 0 3 3 0 006 0z"
                                    />
                                </svg>

                                Usuários

                            </a>


                            <!-- Configurações -->
                            <a
                                href="#"
                                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-zinc-400 transition hover:bg-zinc-800 hover:text-zinc-100"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35A1.724 1.724 0 004.317 7.75c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.573-1.065z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>

                                Configurações

                            </a>

                        </div>

                    </div>


                    <!-- Menu inferior -->
                    <div class="mt-auto">

                        <div class="mb-4 border-t border-zinc-800"></div>

                        <a
                            href="#"
                            class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-zinc-400 transition hover:bg-zinc-800 hover:text-zinc-100"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.8"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"
                                />
                            </svg>

                            Sair

                        </a>

                    </div>

                </nav>

            </aside>


            <!-- =====================================
                 MAIN CONTENT
            ====================================== -->
            <main class="flex-1 overflow-y-auto bg-zinc-950">

                <div class="mx-auto max-w-7xl p-6 lg:p-8">


                    <!-- Page title -->
                    <div class="mb-8">

                        <p class="mb-1 text-sm text-indigo-400">
                            Visão geral
                        </p>

                        <h1 class="text-2xl font-bold tracking-tight text-white">
                            Dashboard
                        </h1>

                        <p class="mt-1 text-sm text-zinc-500">
                            Acompanhe as principais informações do sistema.
                        </p>

                    </div>


                    <!-- =================================
                         CARDS
                    ================================== -->
                    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">


                        <!-- Card -->
                        <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-5">

                            <p class="text-sm text-zinc-500">
                                Usuários
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                1.284
                            </p>

                            <p class="mt-2 text-xs text-emerald-400">
                                +12,5% este mês
                            </p>

                        </div>


                        <!-- Card -->
                        <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-5">

                            <p class="text-sm text-zinc-500">
                                Projetos
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                348
                            </p>

                            <p class="mt-2 text-xs text-emerald-400">
                                +8,2% este mês
                            </p>

                        </div>


                        <!-- Card -->
                        <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-5">

                            <p class="text-sm text-zinc-500">
                                Receita
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                R$ 24.580
                            </p>

                            <p class="mt-2 text-xs text-emerald-400">
                                +15,3% este mês
                            </p>

                        </div>


                        <!-- Card -->
                        <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-5">

                            <p class="text-sm text-zinc-500">
                                Conversão
                            </p>

                            <p class="mt-2 text-3xl font-bold text-white">
                                8,42%
                            </p>

                            <p class="mt-2 text-xs text-emerald-400">
                                +2,1% este mês
                            </p>

                        </div>

                    </div>


                    <!-- =================================
                         CONTENT
                    ================================== -->
                    <div class="mt-6 grid gap-6 lg:grid-cols-3">


                        <!-- Main content -->
                        <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-6 lg:col-span-2">

                            <div class="flex items-center justify-between">

                                <div>

                                    <h2 class="font-semibold text-white">
                                        Atividade recente
                                    </h2>

                                    <p class="mt-1 text-sm text-zinc-500">
                                        Últimas atividades realizadas no sistema.
                                    </p>

                                </div>

                                <button
                                    type="button"
                                    class="rounded-lg border border-zinc-700 px-3 py-2 text-sm text-zinc-300 transition hover:bg-zinc-800"
                                >
                                    Ver tudo
                                </button>

                            </div>


                            <!-- Activities -->
                            <div class="mt-6 divide-y divide-zinc-800">


                                <div class="flex items-center justify-between py-4">

                                    <div>

                                        <p class="text-sm font-medium text-zinc-200">
                                            Novo usuário cadastrado
                                        </p>

                                        <p class="mt-1 text-xs text-zinc-500">
                                            há 5 minutos
                                        </p>

                                    </div>

                                    <span class="rounded-full bg-emerald-500/10 px-2.5 py-1 text-xs font-medium text-emerald-400">
                                        Novo
                                    </span>

                                </div>


                                <div class="flex items-center justify-between py-4">

                                    <div>

                                        <p class="text-sm font-medium text-zinc-200">
                                            Projeto atualizado
                                        </p>

                                        <p class="mt-1 text-xs text-zinc-500">
                                            há 32 minutos
                                        </p>

                                    </div>

                                    <span class="rounded-full bg-indigo-500/10 px-2.5 py-1 text-xs font-medium text-indigo-400">
                                        Atualizado
                                    </span>

                                </div>


                                <div class="flex items-center justify-between py-4">

                                    <div>

                                        <p class="text-sm font-medium text-zinc-200">
                                            Pagamento recebido
                                        </p>

                                        <p class="mt-1 text-xs text-zinc-500">
                                            há 1 hora
                                        </p>

                                    </div>

                                    <span class="rounded-full bg-emerald-500/10 px-2.5 py-1 text-xs font-medium text-emerald-400">
                                        Pago
                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- Summary -->
                        <div class="rounded-xl border border-zinc-800 bg-zinc-900 p-6">

                            <h2 class="font-semibold text-white">
                                Resumo
                            </h2>

                            <p class="mt-1 text-sm text-zinc-500">
                                Informações rápidas.
                            </p>


                            <div class="mt-6 space-y-5">


                                <!-- Storage -->
                                <div>

                                    <div class="mb-2 flex justify-between text-sm">

                                        <span class="text-zinc-400">
                                            Armazenamento
                                        </span>

                                        <span class="text-zinc-200">
                                            72%
                                        </span>

                                    </div>

                                    <div class="h-2 overflow-hidden rounded-full bg-zinc-800">

                                        <div class="h-full w-[72%] rounded-full bg-indigo-500"></div>

                                    </div>

                                </div>


                                <!-- Processing -->
                                <div>

                                    <div class="mb-2 flex justify-between text-sm">

                                        <span class="text-zinc-400">
                                            Processamento
                                        </span>

                                        <span class="text-zinc-200">
                                            48%
                                        </span>

                                    </div>

                                    <div class="h-2 overflow-hidden rounded-full bg-zinc-800">

                                        <div class="h-full w-[48%] rounded-full bg-indigo-500"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </main>

        </div>


        <!-- =========================================
             FOOTER
        ========================================== -->
        <footer class="shrink-0 border-t border-zinc-800 bg-zinc-900">

            <div class="flex min-h-14 flex-col items-center justify-between gap-2 px-6 py-4 text-xs text-zinc-500 sm:flex-row">

                <p>
                    © 2026 Admin. Todos os direitos reservados.
                </p>

                <div class="flex gap-4">

                    <a
                        href="#"
                        class="transition hover:text-zinc-300"
                    >
                        Privacidade
                    </a>

                    <a
                        href="#"
                        class="transition hover:text-zinc-300"
                    >
                        Termos
                    </a>

                </div>

            </div>

        </footer>

    </div>

</body>

</html>