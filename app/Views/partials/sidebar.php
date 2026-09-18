  <aside class="hidden w-64 shrink-0 border-r border-zinc-800 bg-zinc-900 lg:block">

      <nav class="flex h-full flex-col p-4">

          <!-- Menu -->
          <div>

              <p class="mb-3 px-3 text-xs font-semibold uppercase tracking-wider text-zinc-500">
                  Menu
              </p>


              <div class="space-y-1">

                  <!-- Home -->
                  <a
                      href="<?= url_to('home.index') ?>"
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

                      Home

                  </a>


                  <!-- Usuários -->
                  <a
                      href="<?= url_to('user.show', 'alexandre', 20) ?>"
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
