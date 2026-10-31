---
trigger: model_decision
description: "Rule será executada quando o usuário pedir para refatorar o projeto"
---

# Diretrizes para Refatoração

Ao executar qualquer tarefa ou sugestão de refatoração neste projeto, siga rigorosamente as diretrizes abaixo:

## 1. Escopo Restrito de Análise
- **Permitido:** Apenas arquivos e diretórios localizados dentro da pasta `app/`.
- **Proibido:** Qualquer análise, leitura ou inspeção de pastas e arquivos fora do diretório `app/` é estritamente proibida.

## 2. Agrupamento de Rotas
- As rotas da aplicação devem estar devidamente agrupadas (utilizando recursos como `$routes->group(...)`), mantendo a organização por contexto, módulos, prefixos ou filtros pertinentes.

## 3. Centralização de Queries nos Models
- Consultas a banco de dados (queries) duplicadas ou repetidas dentro de controllers devem ser extraídas e encapsuladas em métodos reutilizáveis dentro do respectivo `Model`.
- O controller deve apenas invocar o método correspondente do Model.

## 4. Métodos HTMX
- Qualquer método existente dentro dos controllers que estejam relacionados ao HTMX tem que ser colocados em um controller somente para essa funcionalidade.

## 5. Aprovação Obrigatória do Usuário
- **Nenhuma linha de código pode ser alterada sem a aprovação prévia e expressa do usuário.**
- O fluxo obrigatório para refatoração é:
  1. Analisar o código dentro do escopo permitido.
  2. Apresentar o plano detalhado de alterações e as propostas de diff ao usuário.
  3. Aguardar a autorização do usuário antes de realizar qualquer modificação ou criar/editar arquivos.
