# Auditoria e implementação — gbr.dev.br

Data: 8 de novembro de 2026. Projeto: `Gabriel/`, Laravel 9, Blade e Bootstrap 5. Trabalho exclusivamente local, sem deploy, commits, alterações no `.env` real ou envios reais de e-mail.

## 1. Resumo executivo

O Git estava limpo antes das alterações. Foram lidos rotas, controller de contato, middleware de idioma, Kernel, providers relevantes, views, traduções PT/EN, CSS/JS públicos, configuração de mail, dependências e testes. A identidade existente (fundos escuros, azul, cards e fotografia) foi mantida. O projeto já tinha navegação Bootstrap responsiva, proteção CSRF e validação básica, além de descrições profissionais detalhadas. Esses pontos não foram tratados como ausentes.

Foram confirmados: remetente baseado no visitante, conflito de `$message` com o objeto de e-mail do Laravel, falta de feedback/old input nos formulários, ausência de rate limiting e honeypot, sitemap deliberadamente retornando 404, idioma dependente de sessão, metadados genéricos, ausência de projetos e posicionamento inicial centrado em supervisão.

A implementação entrega contato testado com remetente configurado e reply-to do visitante, tratamento de falhas, URLs persistentes PT/EN, sitemap com 12 páginas, metadados específicos, currículo imprimível, projetos configuráveis, apresentação de desenvolvedor sênior, competências priorizadas e melhorias de acessibilidade/responsividade. A fotografia original foi preservada e ganhou uma alternativa WebP menor.

Resultado verificado: 11 testes PHP / 162 asserções aprovados; JavaScript WhatsApp com quatro asserções aprovadas; compilação de views e cache de rotas aprovados. Não há comprovação visual nas seis resoluções: o Chromium não iniciou por bibliotecas ausentes e a instalação exigiu senha de administrador. Não foram medidos Lighthouse, LCP, CLS ou INP. A entrega está implementada para validação, com critérios visuais, leitores de tela, SMTP e previews sociais ainda pendentes; não é uma declaração de conclusão integral desses critérios.

## 2. Lista completa das alterações

| Categoria | Problema anterior | Correção realizada | Arquivos alterados | Status |
|---|---|---|---|---|
| Contato | Visitante usado como remetente | Mailable com `mail.from`, nome da aplicação e reply-to do visitante | `app/Mail/ContactMessage.php`, `app/Http/Controllers/ContactController.php` | Corrigido |
| Contato | `$message` ambíguo na view | Conteúdo em `contactMessage`, saída escapada | `resources/views/emails/contact.blade.php` | Corrigido |
| Contato | Sucesso não exibido e campos perdidos | Formulário compartilhado com feedback, old input e erros associados | `resources/views/includes/contact-form.blade.php`, `index.blade.php`, `contacts.blade.php` | Corrigido |
| Contato | Falha SMTP sem retorno amigável | Captura de exceção, mensagem traduzida, retenção dos campos e log sem conteúdo/credenciais | `ContactController.php`, `lang/*/portfolio.php` | Corrigido |
| Segurança | Validação sem limites proporcionais em todos os fluxos | Nome 120, e-mail 254, telefone 30, mensagem 4000; honeypot vazio | Controller e formulário | Corrigido |
| Segurança | CSRF | Mantido middleware e token; teste explícito com 419 sem token e envio fake com token válido | `Kernel.php`, formulário, `tests/Feature/PortfolioTest.php` | Já estava correto |
| Segurança | Abuso sem limite | Cinco tentativas/minuto por IP, compartilhadas entre PT, EN e endpoint antigo; página 429 | `routes/web.php`, `resources/views/errors/429.blade.php` | Corrigido |
| Interação | WhatsApp com `+` no destino e leitura global de campos | Destino wa.me normalizado, formulário do botão, encodeURIComponent e validação de nome/mensagem | `public/js/app.js`, views sociais | Corrigido |
| Posicionamento | Hero privilegiava supervisão | Nome, cargo sênior, especialidades e resumo hands-on; liderança como diferencial | `index.blade.php`, traduções | Corrigido |
| Currículo | Nenhum PDF disponível | Página PT/EN imprimível reutilizando as experiências e formação reais | `resume.blade.php`, `includes/experience-list.blade.php` | Corrigido |
| Projetos | Nenhuma seção estruturada | Array de configuração e template reutilizável; Brasileirão Analytics com limites explícitos | `config/portfolio.php`, `includes/projects.blade.php`, traduções | Corrigido |
| Competências | Ênfase pouco hierarquizada | Resumo Backend, Frontend, Bancos e Infraestrutura na home e skills; lista detalhada preservada | `includes/core-skills.blade.php`, `index.blade.php`, `skills.blade.php` | Corrigido |
| Experiência | Introdução genérica, liderança como destino principal | Resumo técnico na home; introduções revistas; responsabilidades, empresas e períodos preservados | `experiences.blade.php`, traduções, partial de experiências | Corrigido |
| Conteúdo | Princípios genéricos | Revisão de código, evolução de legado/APIs e colaboração técnica baseadas nas responsabilidades existentes | `lang/pt_BR/messages.php`, `lang/en/messages.php` | Corrigido |
| Idiomas | Sessão e bandeiras | URLs `/pt` e `/en`, links da página equivalente e seletor textual com labels | Rotas, middleware, Kernel, header | Corrigido |
| Compatibilidade | URLs anteriores sem plano de migração | 301 de páginas antigas para PT; rota antiga de idioma redireciona; POST antigo mantido com as mesmas proteções | `routes/web.php` | Corrigido |
| SEO | Sitemap 404 | XML dinâmico, 12 URLs públicas e alternates; exclui POST e utilitários | `sitemap.blade.php`, rotas, `robots.txt` | Corrigido |
| SEO | Title/description/canonical genéricos ou ausentes | Metadados por página/idioma, hreflang recíproco, x-default, Person e WebSite | `includes/head.blade.php`, `lang/*/portfolio.php` | Corrigido |
| Social | OG sempre home e imagem sem dimensões declaradas | URL/título/descrição específicos; foto existente 922×1152 e alt; Twitter summary | `includes/head.blade.php` | Parcialmente corrigido |
| Imagens | JPEG 562.086 bytes na interface | Alternativa WebP 26.496 bytes, 720×900; picture com fallback; dimensões explícitas | `public/images/final.webp`, home, about, CSS | Corrigido |
| Performance | JS síncrono e ausência de regras locais para assets | defer; versões por mtime; regras opcionais de compressão/cache de arquivos | includes CDN/footer, `.htaccess` | Parcialmente corrigido |
| Responsividade | overflow-x hidden e riscos de larguras fixas | Remoção do ocultamento; quebra de datas, marca flexível, min-width, gutters contidos | `public/css/styles.css` | Parcialmente corrigido |
| Acessibilidade | Sem skip link/foco global, mensagens e estado ativo incompletos | Skip link, foco visível, aria-current, regiões de status/alerta, campos associados, touch targets e reduced motion | Head, header, formulário, CSS/JS | Parcialmente corrigido |
| Contraste | WhatsApp #128c7e sobre branco = 4,14:1 | #087568 sobre branco = 5,59:1 (cálculo estático) | `public/css/styles.css`, `docs/qa/static-checks.json` | Corrigido |
| Manutenção | Formulário duplicado, experiências duplicariam no currículo | Partials para contato, competências, experiências e projetos; remoção de seletores comprovadamente sem uso | Includes e CSS | Corrigido |
| QA | Apenas dois testes básicos | Testes funcionais, SMTP fake, CSRF, limites, XML, idiomas e metadados; roteiros JS/Playwright | `tests/`, `docs/qa/` | Corrigido |
| QA visual | Sem evidência de seis larguras | Roteiro preparado, execução bloqueada por dependências de sistema | `tests/browser/portfolio.cjs`, `docs/qa/README.md` | Não foi possível verificar |
| Dados profissionais | Sobreposição Simplifica/Omnilink em ago–set/2020 | Períodos mantidos; confirmação do proprietário necessária | Traduções preservadas | Pendente |

### Inventário de arquivos

Os caminhos abaixo são relativos a `Gabriel/`. Não houve remoção de arquivos. O JPEG original permanece intacto. O inventário completo está no final deste relatório.

## 3. Detalhamento técnico

### Controllers e e-mail

`ContactController` valida a entrada e entrega um `ContactMessage` por `Mail::to`. O remetente vem exclusivamente de `config('mail.from')`; o visitante é reply-to com nome e e-mail. O destinatário fica em `config/portfolio.php`, com variável opcional `CONTACT_TO_ADDRESS` e o endereço público já existente como padrão. Não se presumiu acesso às credenciais SMTP nem se alterou `.env`.

A captura de falhas registra somente a classe da exceção, evitando persistir corpo, endereço do visitante ou detalhes potencialmente sensíveis do transporte. A mensagem de erro orienta a tentar novamente ou usar canais alternativos. Os campos ficam em old input; no sucesso não são reintroduzidos. O Blade escapa todo o conteúdo do visitante, inclusive no e-mail.

O envio é síncrono, adequado ao volume deste portfólio. Não foram adicionados workers, filas, banco ou serviços externos. O botão fica desabilitado e anuncia envio durante uma submissão válida; `pageshow` restaura estado ao retornar pelo histórico. O backend continua funcionando sem JavaScript.

### Rotas e idiomas

As seis páginas têm versões `/pt` e `/en`: home, skills, experiences, about, contacts e resume. `SetLocale` passa ao stack global e lê o primeiro segmento antes do throttle, permitindo que até o erro 429 use o idioma da URL. `URL::defaults` preserva locale em `route()`. A sessão anterior deixa de decidir a língua do conteúdo.

As páginas sem prefixo têm redirecionamento permanente para português, estável e independente de cookies. `/lang/pt_BR`, `/lang/pt` e `/lang/en` redirecionam para a home correspondente; os seletores novos preservam a página atual. Idioma desconhecido retorna 404. Não há redirecionamento baseado em Referer nem em URL fornecida pelo visitante. O POST antigo `/send-email` continua funcional para não perder submissões abertas antes da atualização; novos formulários usam `/{locale}/send-email`.

O throttle é o nativo Laravel (`5,1`), por IP e compartilhado entre rotas de envio, verificado em teste. Depende de cache funcional e, em infraestrutura com proxy, de configuração correta dos proxies confiáveis; não se ampliou indiscriminadamente essa confiança.

### Views, conteúdo e projetos

A home segue apresentação, competências, projetos, experiência resumida, formação e contato. LinkedIn/GitHub/currículo são visíveis no hero e Contatos permanece na navegação. O currículo oferece impressão/salvar PDF do navegador, sem prometer download de um arquivo inexistente. A versão impressa reaproveita todas as experiências existentes.

Os partials Blade mantêm a arquitetura Laravel. Para adicionar um projeto, inserir uma entrada em `config/portfolio.php` e textos com a mesma chave em `lang/pt_BR/portfolio.php` e `lang/en/portfolio.php`. O link `demo` é opcional, ausente no projeto atual.

O README público do Brasileirão Analytics foi consultado pela integração GitHub, arquivo `README.md`, SHA `f96950bf556ef5241574b05ce091f06c4123d9e5`, além de leitura das rotas e serviços da cópia local `/var/www/html/brasileirao-analytics` (somente leitura). Referência: https://github.com/gabee97/brasileirao-analytics/blob/main/README.md. O projeto tem base Blade/REST/serviços/testes; os endpoints públicos respondem 501. Um helper de pontuação esperada Elo foi encontrado na cópia local, mas não comprova um motor completo nem previsões públicas; a descrição permanece conservadora. PostgreSQL e filas são planos desse projeto, não competências adicionadas ao currículo. Nenhuma demo, captura ou resultado estatístico foi inventado. Não foram incluídos outros repositórios sem análise suficiente.

Empresas, cargos, datas, formação e idiomas existentes foram mantidos. Não houve adição de métricas de negócio, certificações ou resultados. Conhecimentos detalhados em Java e ferramentas anteriores permanecem na página de competências; o resumo dá prioridade a PHP/Laravel e distingue MySQL dos demais bancos.

### CSS e JavaScript

Mantidas cores, foto, Bootstrap e cards. Foram retirados seletores antigos sem correspondência nas views (`row-division`, `space`, `image-code`, etc.) e estilos de bandeiras/ícones de menu removidos. `overflow-x: hidden` saiu do body. Datas podem encolher e quebrar; a marca pode quebrar em telas estreitas; os gutters horizontais das rows diretas da container não ultrapassam seu padding. As regras mobile existentes foram preservadas. Isso é revisão de código, não prova de ausência de overflow renderizado.

WhatsApp usa o formulário associado ao botão e `encodeURIComponent`; o teste Node verifica acentos, espaços, `+`, `&`, `?`, `%`, destino e isolamento da janela, sem abrir WhatsApp real. Os links de contato direto mantêm a mensagem traduzida já codificada.

### SEO

Metadados traduzidos e específicos por rota, canonical sem query string, alternates PT-BR/EN e x-default PT. `PORTFOLIO_URL` define a origem pública canônica, com padrão `https://gbr.dev.br`; os links normais e assets continuam usando geração de URL do Laravel. O sitemap inclui apenas 12 páginas GET, com alternates; sem data lastmod inventada. robots libera indexação e aponta o sitemap de produção. Em staging, bloquear indexação no ambiente/servidor; não publicar um robots de staging no domínio principal.

JSON-LD inclui nome público, cargo de posicionamento, foto e perfis públicos em Person; WebSite lista os dois idiomas. A foto OG existe e mede 922×1152. Foi usado Twitter `summary`, coerente com imagem de retrato, em vez de anunciar uma capa horizontal inexistente. A apresentação final em LinkedIn/WhatsApp/X ainda exige teste real de crawlers; o retrato pode sofrer recorte. Nenhuma nota de SEO ou garantia de indexação é alegada.

### Performance e infraestrutura

`final.jpg` permanece com 562.086 bytes (922×1152); `final.webp` tem 26.496 bytes (720×900), redução de aproximadamente 95,3% no tamanho do arquivo alternativo. A proporção foi preservada, sem trocar pessoa, foto ou conteúdo. O picture ocupa o mesmo quadro circular, mantendo object-fit. A home prioriza a foto com fetchpriority high e não usa lazy; sobre usa lazy/decoding async. As dimensões e quadro com aspect-ratio reservam espaço, mas CLS não foi medido.

Bootstrap JS e script local usam defer; não foram adicionadas bibliotecas no frontend. Bootstrap CSS/JS e Font Awesome continuam em CDNs com versões existentes fixadas. As bandeiras externas deixaram de ser requisitadas. Em Apache, `mod_deflate`/`mod_expires`, se habilitados, aplicam compressão textual e cache apenas aos tipos de assets indicados. CSS/JS usam mtime na URL para invalidar cache. Não foram impostas regras de cache aos formulários ou HTML com sessão. Cabeçalhos efetivos e módulos do servidor de produção permanecem não verificados.

Não há necessidade de Node/build para os assets em uso: views carregam `public/css/styles.css` e `public/js/app.js` diretamente, sem `@vite`. O `vite.config.js` legado aponta para `resources/js/app.js`, ausente antes deste trabalho; esse pipeline não está ativo nas views e não foi executado nem apresentado como aprovado. Não houve mudança nas dependências Composer/npm nem migração de framework.

### Acessibilidade

Foram acrescentados skip link, foco visível, área mínima de toque em links compactos, indicação de página/idioma atual, estados de envio anunciados, alertas de erro, labels e associação de erros por `aria-describedby`. Campos inválidos recebem `aria-invalid`. Honeypot sai da tabulação e da árvore acessível. Movimento reduzido desativa transições/animações. HTML semântico e headings existentes foram mantidos; a home possui h1 com nome e h2 para as seções.

Os cálculos estáticos de contraste estão em `docs/qa/static-checks.json`: WhatsApp novo 5,59:1, muted no branco 5,59:1 e azul no branco 5,17:1. Não são uma auditoria de todos os estados/gradientes. WCAG 2.2 AA integral depende de inspeção renderizada, teclado, leitores de tela, zoom, impressão e revisão humana pendentes.

### Testes e manutenção

O teste original da home passou a esperar o 301 solicitado e também a renderização de `/pt`; não foi excluído. A primeira rodada após mudar URLs falhou porque ainda esperava 200 em `/`, uma consequência intencional da migração. A suíte nova inicialmente detectou localização incorreta do 429 (middleware ordenado após throttle) e uma chamada de render incompatível com MailFake; a localização foi corrigida no código e o conteúdo escapado passou a ser verificado diretamente pela view. A suíte final passou inclusive com cache de rotas ativo.

`Mail::fake()` impede envio real nos casos de sucesso/validação/abuso/CSRF. O cenário de falha usa mock do transporte lançando exceção. Não é necessário banco para esses testes. As ferramentas Playwright/axe foram instaladas somente em `/tmp`, sem alterar dependências do produto.

## 4. Testes executados

| Teste | Comando ou ferramenta | Resultado | Evidência |
|---|---|---|---|
| Baseline anterior | `php artisan test` | 2 testes passaram | Saída real da sessão anterior às edições |
| Suíte funcional final | `php artisan test` | 11 testes aprovados | Terminal; inclui home, idiomas, sitemap, CSRF, mail, validação, honeypot, falha e throttle |
| PHPUnit com cache de rotas | `vendor/bin/phpunit --log-junit docs/qa/phpunit.xml` | 11 testes, 162 asserções, zero erros/falhas | `docs/qa/phpunit.xml` |
| Sintaxe JS | `node --check public/js/app.js` e `node --check tests/browser/portfolio.cjs` | Aprovada | Exit code 0 |
| WhatsApp isolado | `node tests/browser/whatsapp.cjs` | 4 asserções aprovadas | Saída: `WhatsApp: encoding, target, window isolation and required fields passed (4 assertions).` |
| Compatibilidade PHP/extensões | `composer check-platform-reqs` | Todos requisitos instalados aprovados, PHP 8.3.6 | Terminal |
| Blade | `php artisan view:cache` | Compilação aprovada | `Blade templates cached successfully` |
| Rotas | `php artisan route:list --except-vendor` e `php artisan route:cache` | 16 rotas listadas; cache aprovado | Terminal |
| Limpeza dos caches de verificação | `php artisan route:clear`, `php artisan view:clear` | Aprovada | Terminal; não deixou cache de rotas de teste ativo |
| Diff | `git diff --check` | Sem erros de whitespace | Exit code 0 |
| Imagem | PHP GD/getimagesize e tamanho em bytes | Original 922×1152/562.086; alternativa 720×900/26.496 | `docs/qa/static-checks.json` |
| Contraste | Fórmula de luminância relativa WCAG nas cores declaradas | WhatsApp 4,14:1 → 5,59:1 | `docs/qa/static-checks.json` |
| Navegador / axe | `node tests/browser/portfolio.cjs` com Playwright | Bloqueado antes de abrir página por `libnspr4.so` ausente | `docs/qa/README.md` |
| Instalar suporte Chromium | `playwright install-deps chromium` | Falhou: sudo exige terminal/senha | Saída real, resumida em `docs/qa/README.md` |
| Lighthouse, LCP, CLS, INP | Não executados | Não foi possível verificar | Sem navegador operacional ou dados de campo |
| SMTP/SPF/DKIM/DMARC | Não executado contra servidor real | Não foi possível verificar | Sem envio real ou exposição de configuração |

## 5. Validação responsiva

| Largura | Teste real renderizado | Problemas encontrados por inspeção | Correções realizadas | Pendências |
|---|---|---|---|---|
| 320 px | Não | Marca longa, gutters g-5 e datas sem encolhimento eram riscos de overflow | Marca flexível, gutters contidos, flex shrink e quebra de texto | Executar Playwright e revisar menu/foto/botões/formulário |
| 375 px | Não | Mesmos riscos estruturais | Mesmas regras, botões empilhados e foto fluida preservados | Teste visual, teclado e toque |
| 430 px | Não | Mesmos riscos estruturais | Mesmas regras de contenção e grid mobile | Teste visual e seções longas |
| 768 px | Não | Transição de grid e menu colapsado exigem inspeção | Grid de tecnologias responsivo preservado, gutters limitados | Testar menu, cards, idiomas e timeline/cards de experiência |
| 1366 px | Não | Navegação extensa e datas da experiência exigem confirmação | Remoção de redundância social no menu, datas flexíveis | Revisar primeira dobra, alinhamento da foto e rodapé |
| 1920 px | Não | Escala e comprimento visual exigem confirmação | Container Bootstrap e tipografia clamp preservados | Revisar largura de leitura, espaçamento e foto |

O roteiro preparado cobre seis páginas × dois idiomas × seis larguras = 72 combinações, mede scrollWidth/client width, captura home PT, verifica menu mobile e coleta axe/console. Nenhuma dessas 72 visitas foi concluída; não há screenshots antes ou depois. Passos de execução e revisão manual estão em `docs/qa/README.md`. Inspeção de CSS não substitui teste visual. O funcionamento do menu com Bootstrap é mantido no código; não foi validado em navegador real nesta sessão.

## 6. Comparação antes e depois

- Antes, a primeira mensagem era supervisão; agora, nome e desenvolvimento sênior PHP/Laravel, com liderança contextualizada nas responsabilidades existentes.
- Antes, currículo e projetos não tinham acesso direto; agora há CTA para currículo imprimível e projetos configuráveis com estado explícito.
- Antes, o contato podia perder dados e falhar sem retorno; agora há validação, feedback traduzido, retenção de campos, proteção proporcional e testes.
- Antes, compartilhar `/skills` não garantia idioma; agora `/pt/skills` e `/en/skills` são estáveis, com alternates e canonical próprios.
- Antes, sitemap era 404; agora o XML contém 12 páginas públicas testadas.
- Antes, a interface dependia do JPEG de 562.086 bytes; navegadores com WebP recebem 26.496 bytes. Isso comprova redução de arquivo, não melhora medida de LCP, pontuação ou conversão.
- Antes, o card WhatsApp tinha 4,14:1 de contraste calculado no branco; agora 5,59:1. A conformidade integral do site ainda não foi demonstrada.

## 7. Pendências

1. **Validação visual nas seis larguras, screenshots e teste axe:** bloqueada por bibliotecas Chromium ausentes e falta de senha sudo. Impacto: overflow, recorte e sobreposições não podem ser descartados empiricamente. Executar o roteiro e revisão manual antes de aprovar a publicação.
2. **Teclado/leitor de tela/zoom/impressão reais:** dependem de navegador e revisão humana. Impacto: não há certificação WCAG nem garantia de paginação perfeita do PDF. Verificar menu, labels, alertas, foco e versão impressa em PT/EN.
3. **Lighthouse e métricas de campo:** não medidos. Executar em ambiente representativo e registrar resultados reais; INP requer uso/interações/dados apropriados. Não extrapolar redução de imagem para desempenho de usuários.
4. **SMTP e DNS do domínio:** configurar/remeter pelo endereço autorizado no provedor e validar SPF/DKIM/DMARC. O código usa mail.from, mas só o operador pode confirmar que corresponde à conta autenticada. Realizar um envio manual consentido em staging/depois de publicar e conferir reply-to; testes não enviaram mensagens reais.
5. **Preview social e indexação:** tags/arquivo/dimensões revisados; usar validadores de compartilhamento e Search Console no domínio publicado. Retrato OG pode ser recortado; nenhuma prévia social foi confirmada.
6. **Períodos de trabalho:** Simplifica vai até setembro/2020 e Omnilink começa agosto/2020. Confirmar se foi sobreposição legítima; não foram inventadas correções de datas. Confirmar também os registros “até o presente” antes da publicação.
7. **Apache/proxy/cache:** módulos, HTTPS, cabeçalhos e IP real não validados em produção. Conferir mod_rewrite, mod_deflate, mod_expires, certificado e configuração de proxy se aplicável; cache Laravel precisa ser persistente para o rate limiter.
8. **Pipeline Vite legado:** configuração preexistente referencia entrada inexistente e não é usada pelas páginas. Não executar npm build como parte deste deploy; se futuramente ativar Vite, regularizar a configuração/entradas nessa tarefa específica.
9. **Dependências Laravel 9:** nenhuma atualização principal foi feita. Compatibilidade local verificada; não foi realizada auditoria online completa de vulnerabilidades nem atualização de dependências. A avaliação de suporte e segurança para produção permanece necessária, sem afirmar ausência de vulnerabilidades.

## 8. Instruções de deploy

**Nenhum comando desta seção foi executado em produção.** Fazer primeiro a validação local/staging e resolver as pendências impeditivas conforme seu processo. A raiz Apache deve apontar para `Gabriel/public`, nunca para a raiz do repositório.

### Preparação e configuração

1. Guardar uma release anterior completa e backup seguro da configuração, fora da pasta pública. Fazer revisão do diff, selecionar/versionar a entrega manualmente e transportar somente arquivos aprovados. Não sobrescrever `.env`, storage persistente ou arquivos de outras aplicações. Não publicar `.git`, logs ou relatório de testes na raiz pública.
2. Na nova release, com PHP/Composer compatíveis com `composer.lock`:

```bash
cd /caminho/da/release/Gabriel
composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
composer check-platform-reqs --no-dev
```

Não usar `composer update`. A aplicação não requer build npm: os assets ativos são os de `public/`. Não há migrations novas e não se deve executá-las por este trabalho. Nenhuma fila nova exige supervisor/queue worker.

3. Configurar manualmente o `.env` já existente, sem exibir credenciais em logs:

- `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://gbr.dev.br` e `APP_KEY` existente, preservada.
- `PORTFOLIO_URL=https://gbr.dev.br` (opcional, já é padrão).
- `CONTACT_TO_ADDRESS` para o destinatário desejado (opcional, padrão preserva o endereço público anterior).
- `MAIL_MAILER=smtp`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION` conforme o provedor.
- `MAIL_FROM_ADDRESS` precisa ser autorizado pelo provedor/autenticação; `MAIL_FROM_NAME` deve identificar Gabriel/site. Nunca usar endereço de visitante nesse campo.
- Sessão/cache funcionais e persistentes. Laravel 9 usa `CACHE_DRIVER`; não usar array em produção. `file` é suficiente para uma única instância; múltiplas instâncias precisam compartilhar o contador, por exemplo Redis já provisionado pelo operador.

`.env.example` documenta apenas as novas variáveis públicas, sem secrets. Não gerar nova APP_KEY em produção.

4. Garantir que o usuário de deploy e o usuário/grupo real do Apache tenham os acessos apropriados a `storage/` e `bootstrap/cache/`. Conferir usuários/grupos antes de alterar permissões. Se o grupo já estiver corretamente configurado, uma opção é:

```bash
chmod -R ug+rwX storage bootstrap/cache
```

Não usar chmod 777 e não aplicar chown recursivo em aplicações vizinhas. Manter código fora desses diretórios sem permissão de escrita desnecessária para o Apache.

### Ativação

Preparar a release fora do diretório ativo e usar a estratégia de troca de release configurada no servidor. Se o processo exigir indisponibilidade, ativar manutenção temporária (`php artisan down`) somente durante a janela aprovada. Após configurar a release:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Ativar a release pelo mecanismo existente; executar `php artisan up` se manutenção tiver sido ativada. Se houver OPcache com validação de timestamp desativada, reiniciar/recarregar o serviço PHP/Apache conforme a topologia real e a janela aprovada. Não presumir PHP-FPM num servidor que usa mod_php.

As alterações `.htaccess` são condicionadas à presença dos módulos. Garantir AllowOverride adequado, mod_rewrite e HTTPS. Canonical não substitui redirecionamento HTTP→HTTPS na configuração do virtual host.

### Verificações após ativar

- `/` → 301 `/pt`, `/skills` → 301 `/pt/skills`; páginas PT/EN e seletor mantêm a página equivalente.
- `/sitemap.xml` → 200 XML com 12 URLs, `robots.txt` e canonicals de produção.
- Foto WebP, fallback JPEG, CSS/JS com versão, menu mobile e links profissionais.
- Currículo PT/EN com prévia de impressão e download PDF pelo navegador.
- Mensagem válida manual: feedback e entrega ao destinatário; reply-to correto. Erros de validação, token CSRF, honeypot e limite de tentativas sem abusar do SMTP real.
- Conferir logs de erro sem expor credenciais; HTTPS e headers reais de compressão/cache.
- Executar revisão responsiva/acessível antes de dar aceite. Testes PHPUnit devem rodar em desenvolvimento/CI com dependências de dev e mail fake, não exigem instalação dessas ferramentas em produção.

### Rollback

Reativar a release anterior preservada pelo mecanismo de releases do servidor, mantendo `.env` e storage persistentes. Não usar git reset --hard, não apagar arquivos de usuário nem regenerar chave. Reconstruir config/route/view cache para o código anterior e revalidar páginas e contato. Esta entrega não modifica esquema de banco; não exige rollback de migrations. Restaurar configuração de Apache somente se ela tiver sido alterada no deploy aprovado. As cópias de configuração podem conter secrets e precisam de armazenamento protegido.

### Testar localmente

Com vendor instalado e `.env` local já configurado, sem substituir a configuração existente:

```bash
cd /var/www/html/gabrielSite/Gabriel
php artisan test
node tests/browser/whatsapp.cjs
php artisan serve --host=127.0.0.1 --port=8000
```

Abrir `http://127.0.0.1:8000/pt` e `/en`, navegar pelas páginas e imprimir `/pt/resume` e `/en/resume`. Para teste manual de formulário sem entregar e-mail real, usar ambiente isolado com mailer `log` ou `array`, configurado pelo operador; PHPUnit já usa fake/array. Não editar o `.env` de produção para testar. Para Playwright, seguir `docs/qa/README.md`.

## 9. Melhorias futuras

Opcionais, separadas das pendências acima:

- Acrescentar projetos públicos mais completos após análise e autorização de conteúdo, usando a estrutura já criada.
- Atualizar o card Brasileirão Analytics conforme funcionalidades efetivamente concluídas.
- Criar uma capa social horizontal dedicada a partir de identidade/foto reais, com aprovação visual.
- Avaliar hospedagem local de Bootstrap/ícones para reduzir dependência de CDN, mediante medição.
- Automatizar CI com PHPUnit e Playwright em imagem com bibliotecas prontas.
- Considerar um PDF editorial separado se o currículo imprimível se mostrar insuficiente para candidaturas.

## Inventário final

| Estado | Arquivo |
|---|---|
| Modificado | `.env.example` |
| Modificado | `app/Http/Controllers/ContactController.php` |
| Modificado | `app/Http/Kernel.php` |
| Modificado | `app/Http/Middleware/SetLocale.php` |
| Modificado | `lang/en/messages.php` |
| Modificado | `lang/pt_BR/messages.php` |
| Modificado | `public/.htaccess` |
| Modificado | `public/css/styles.css` |
| Modificado | `public/js/app.js` |
| Modificado | `public/robots.txt` |
| Modificado | `resources/views/about.blade.php` |
| Modificado | `resources/views/contacts.blade.php` |
| Modificado | `resources/views/emails/contact.blade.php` |
| Modificado | `resources/views/experiences.blade.php` |
| Modificado | `resources/views/includes/cdn.blade.php` |
| Modificado | `resources/views/includes/footer.blade.php` |
| Modificado | `resources/views/includes/head.blade.php` |
| Modificado | `resources/views/includes/header.blade.php` |
| Modificado | `resources/views/index.blade.php` |
| Modificado | `resources/views/skills.blade.php` |
| Modificado | `routes/web.php` |
| Modificado | `tests/Feature/ExampleTest.php` |
| Criado | `AUDITORIA_IMPLEMENTACAO.md` |
| Criado | `app/Mail/ContactMessage.php` |
| Criado | `config/portfolio.php` |
| Criado | `docs/qa/README.md` |
| Criado | `docs/qa/phpunit.xml` |
| Criado | `docs/qa/static-checks.json` |
| Criado | `lang/en/portfolio.php` |
| Criado | `lang/pt_BR/portfolio.php` |
| Criado | `lang/pt_BR/validation.php` |
| Criado | `public/images/final.webp` |
| Criado | `resources/views/errors/429.blade.php` |
| Criado | `resources/views/includes/contact-form.blade.php` |
| Criado | `resources/views/includes/core-skills.blade.php` |
| Criado | `resources/views/includes/experience-list.blade.php` |
| Criado | `resources/views/includes/projects.blade.php` |
| Criado | `resources/views/resume.blade.php` |
| Criado | `resources/views/sitemap.blade.php` |
| Criado | `tests/Feature/PortfolioTest.php` |
| Criado | `tests/browser/portfolio.cjs` |
| Criado | `tests/browser/whatsapp.cjs` |

## Ajuste posterior — download direto dos currículos PT/EN

Implementado em 8 de novembro de 2026, preservando as demais alterações locais. Esta seção atualiza o comportamento do CTA descrito anteriormente: a home agora baixa o PDF preparado; as páginas `/pt/resume` e `/en/resume` continuam como currículo online/imprimível e permanecem no sitemap.

### Arquivos modificados neste ajuste

- `resources/views/index.blade.php`: seleção do nome por `app()->getLocale()`, URL `asset('files/'.rawurlencode($resumeFilename))`, atributo `download` com nome original e ícone Font Awesome `fas fa-download`, decorativo (`aria-hidden`).
- `lang/pt_BR/portfolio.php`: `portfolio.resume` passou a `Baixar currículo`.
- `lang/en/portfolio.php`: `portfolio.resume` passou a `Download résumé`.
- `tests/Feature/PortfolioTest.php`: novo teste dos links PT/EN, independência de sessão, codificação dos espaços, HTTPS, atributo download, ícone, classes, ordem e seletor de idioma.
- `AUDITORIA_IMPLEMENTACAO.md`: registro deste ajuste.

A ordem continua projetos, currículo, LinkedIn e GitHub. Projetos permanece azul; currículo permanece outline. CSS, breakpoints, flex-wrap, espaçamento e empilhamento mobile não foram alterados. Nenhuma biblioteca, rota, dependência ou fallback entre idiomas foi acrescentado. URLs de assets seguem o esquema da requisição/configuração Laravel: HTTP local e HTTPS em produção configurada corretamente. Se houver proxy TLS, manter a configuração de proxies confiáveis apropriada, como já necessário para os demais assets.

### Arquivos encontrados e preservados

Os dois PDFs já estavam em `public/files/` nesta etapa:

| Arquivo | Tamanho | Verificação |
|---|---|---|
| `Gabriel Oliveira de Paula - PT.pdf` | 144.375 bytes | Legível e cabeçalho `%PDF-` válido |
| `Gabriel Oliveira de Paula - EN.pdf` | 72.712 bytes | Legível e cabeçalho `%PDF-` válido |

Os hashes SHA-256 antes e depois foram idênticos; nenhum PDF foi criado, regravado ou modificado. Os testes automatizados não dependem da existência dos PDFs, para que a suíte funcione em checkouts onde os arquivos sejam adicionados manualmente. Se um arquivo faltar no servidor, o link permanece no idioma correto e o servidor responde como arquivo ausente; não existe troca silenciosa para português.

### Testes executados e limites

- `vendor/bin/phpunit`: **12 testes, 182 asserções, todos aprovados**. A suíte inclui acessibilidade HTTP das páginas online PT/EN e sitemap com 12 URLs.
- `node tests/browser/whatsapp.cjs`: quatro asserções aprovadas; regressão de interação anterior.
- `git diff --check`: aprovado.
- PHP `fopen`/leitura do cabeçalho: dois PDFs legíveis, cabeçalhos `%PDF-` válidos.
- `sha256sum public/files/*.pdf`: conteúdos preservados antes/depois.

Não foi validado o salvamento do arquivo por navegador real, nem realizada nova inspeção visual nas seis larguras. Permanece a limitação Chromium descrita na auditoria; preservação de responsividade aqui significa manutenção das classes e CSS existentes, não novo teste visual aprovado. O atributo HTML download funciona para os arquivos públicos na mesma origem, sujeito ao comportamento/configuração do navegador. Os arquivos reais não foram alterados para testes.

### Adicionar os PDFs no servidor

Copiar os documentos preparados para o diretório `Gabriel/public/files/` da release publicada, com estes nomes exatos e respeitando maiúsculas e espaços:

```text
Gabriel Oliveira de Paula - PT.pdf
Gabriel Oliveira de Paula - EN.pdf
```

Garantir leitura dos arquivos e acesso aos diretórios pelo Apache; não usar permissões 777. Não é preciso gerar PDFs, instalar dependências, executar build ou criar rotas. Manter os arquivos em cada release ou no mecanismo persistente de assets já usado pelo servidor. Preservar HTTPS e mesma origem dos assets; se houver `ASSET_URL` apontando para domínio externo, o navegador pode ignorar download em links de outra origem e será necessário configurar Content-Disposition no servidor de arquivos ou servir esses PDFs na origem do site.

Após enviar, acessar `/pt` e `/en`, alternar PT/EN, verificar os textos e clicar em cada botão: conferir download, nome e conteúdo no idioma correto. Verificar também `/pt/resume` e `/en/resume`. Nenhum deploy ou commit foi realizado nesta etapa.
