Tudo implementado! Aqui está um resumo do que foi feito:

---

## ✅ O que foi feito

### 📦 htmx instalado
- `npm install htmx.org` — adicionado ao [`package.json`](file:///C:/dev/CI4/package.json)
- Importado e exposto globalmente em [`src/index.js`](file:///C:/dev/CI4/src/index.js)
- `npm run build` executado com sucesso

### 🔐 CSRF configurado para htmx
- [`layout.php`](file:///C:/dev/CI4/app/Views/layout.php) recebeu `<?= csrf_meta() ?>` no `<head>`, gerando uma `<meta name="X-CSRF-TOKEN">` com o token atual
- O `index.js` injeta automaticamente o token no header `X-CSRF-TOKEN` em **todas** as requisições htmx (`htmx:configRequest`)
- Adicionado `PATCH` ao filtro CSRF em [`Filters.php`](file:///C:/dev/CI4/app/Config/Filters.php)

### 🛣️ Rotas adicionadas ([`Routes.php`](file:///C:/dev/CI4/app/Config/Routes.php))
| Método | Rota | Função |
|--------|------|--------|
| `GET` | `/posts/{id}/quick-edit` | Retorna o formulário inline |
| `GET` | `/posts/{id}/row` | Retorna a linha normal (cancelar) |
| `PATCH` | `/posts/{id}/quick-edit` | Salva e retorna a linha atualizada |

### 🎨 Views criadas
- [`posts/partials/post_row.php`](file:///C:/dev/CI4/app/Views/posts/partials/post_row.php) — linha normal com o botão **Edição Rápida** (indigo-700) e botão Deletar
- [`posts/partials/quick_edit_form.php`](file:///C:/dev/CI4/app/Views/posts/partials/quick_edit_form.php) — formulário inline com `input` para título, `textarea` para conteúdo, botões **Salvar** e **Cancelar**
- [`posts/index.php`](file:///C:/dev/CI4/app/Views/posts/index.php) — refatorado para usar `$this->include('posts/partials/post_row')`

### 🧩 Controller ([`Post.php`](file:///C:/dev/CI4/app/Controllers/Post.php))
- `quickEdit()` — retorna o formulário parcial
- `postRow()` — retorna a linha normal (usado pelo Cancelar)
- `quickUpdate()` — salva e retorna a linha atualizada com os novos dados




Pronto! A alteração foi feita na linha 37 do [index.php](file:///C:/dev/CI4/app/Views/posts/index.php#L36-L38).

**O problema:** O `$this->include()` do CI4, quando usado dentro de uma seção (`$this->section()`), não repassa corretamente variáveis locais criadas dentro de um `foreach` para a view incluída, mesmo passando o array como segundo argumento.

**A solução:** Substituir por `view()` — o helper nativo do CI4 que injeta o array de dados diretamente no escopo da view parcial, garantindo que `$post` esteja disponível no [post_row.php](file:///C:/dev/CI4/app/Views/posts/partials/post_row.php).




Resolvido! **A causa do bug:**

- O HTMX com `hx-patch` envia a requisição usando o método HTTP **PATCH**, não **POST**.
- `$this->request->getPost()` no CI4 **só lê dados de requisições POST**. Para PATCH, os dados chegam no corpo raw e retornavam `null`.

**A correção:** Trocado para `$this->request->getVar()` no [`Post.php`](file:///C:/dev/CI4/app/Controllers/Post.php#L60-L63), que lê dados de qualquer método HTTP (GET, POST, PUT, PATCH, DELETE), independente de como foram enviados.




Build concluído. O problema estava no seletor do querySelector no [`src/index.js`](file:///C:/dev/CI4/src/index.js).

**O que estava errado:**

O `csrf_meta()` do CI4 gera a meta tag usando o nome definido em `Security.php`:
```html
<meta name="csrf_test_name" content="TOKEN_VALOR">
```

Mas o JS estava buscando por `meta[name="X-CSRF-TOKEN"]` — esse `name` não existe no DOM, então `meta` era `null` e o header CSRF nunca era enviado. Sem o token, o filtro CSRF do CI4 bloqueava a requisição PATCH e descartava o body, resultando em `title` e `content` vazios.

**A correção:** O seletor foi corrigido para `meta[name="csrf_test_name"]`, que é o nome real da meta tag gerada pelo CI4.


Resolvido corretamente agora. Veja o resumo do que estava errado:

---

**Causa raiz do problema:**

O CI4 tem métodos distintos para ler o body dependendo do método HTTP:

| Método | Como ler dados do body |
|---|---|
| `POST` | `getPost()` ou `getVar()` |
| `PUT` / `PATCH` / `DELETE` | **`getRawInputVar()`** |

O `getVar()` internamente usa `fetchGlobal('request', ...)` que mapeia para `$_REQUEST` — que o PHP **não popula automaticamente** para métodos PATCH. Já o `getRawInputVar()` faz `parse_str($this->body)` diretamente no body cru da requisição, que é exatamente o que o HTMX envia.

O [`Post.php`](file:///C:/dev/CI4/app/Controllers/Post.php#L60-L63) agora usa `getRawInputVar()` corretamente.


Pronto! A alteração foi feita em [`Security.php`](file:///C:/dev/CI4/app/Config/Security.php#L74).

**Por que `regenerate = false` é seguro aqui:**

- Com `regenerate = true`, o token muda após cada request — feito para formulários HTML tradicionais onde a página é recarregada (e assim recebe o novo token).
- Com HTMX/AJAX, **a página não recarrega**, então o token antigo na meta tag fica inválido imediatamente após o primeiro envio.
- Com `regenerate = false`, o token permanece válido durante toda a sessão do usuário — o que ainda protege completamente contra CSRF, pois o atacante continua sem ter acesso ao token.
