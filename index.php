<?php
$menu = [
  ['Salmão Tasquinha', 'Salmão grelhado, acompanhamentos da casa e toque do chef.', 'R$ 89'],
  ['Bacalhau à Lagareiro', 'Bacalhau assado com batatas, alho e azeite de qualidade.', 'R$ 119'],
  ['Risotto', 'Arroz cremoso preparado na medida certa, com sabores da estação.', 'R$ 78'],
  ['Carré de Cordeiro', 'Cordeiro macio, finalizado no ponto e servido com acompanhamentos.', 'R$ 124'],
  ['Pastel de Nata', 'Clássica sobremesa portuguesa, crocante por fora e cremosa por dentro.', 'R$ 18'],
];
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Tasquinha Ferreiro: gastronomia portuguesa em São Luís, no Ponta do Farol.">
  <title>Tasquinha Ferreiro | Restaurante Português em São Luís</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="topbar">
    <a class="brand" href="#inicio" aria-label="Ir para o início">
      <span class="brand-mark">TF</span>
      <span>Tasquinha<br><strong>Ferreiro</strong></span>
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="nav">Menu</button>
    <nav id="nav" class="nav" aria-label="Navegação principal">
      <a href="#sobre">O restaurante</a>
      <a href="#cardapio">Cardápio</a>
      <a href="#avaliacoes">Avaliações</a>
      <a href="#contato">Contato</a>
    </nav>
    <a class="reservation-link" href="#reserva">Reservar mesa</a>
  </header>

  <main>
    <section class="hero" id="inicio">
      <div class="hero-image" role="img" aria-label="Mesa de restaurante com pratos portugueses"></div>
      <div class="hero-content">
        <p class="eyebrow">Cozinha portuguesa · São Luís</p>
        <h1>Sabores que<br><em>ficam na memória.</em></h1>
        <p class="hero-lead">Uma experiência acolhedora no Ponta do Farol, com pratos generosos, bons vinhos e atendimento de verdade.</p>
        <div class="hero-actions">
          <a class="button button-light" href="#cardapio">Conhecer o cardápio</a>
          <a class="text-link" href="tel:+559831818362">Ligar agora <span>↗</span></a>
        </div>
      </div>
      <aside class="rating">
        <strong>4,6</strong>
        <div><span class="stars">★★★★★</span><small>2.322 avaliações no Google</small></div>
      </aside>
    </section>

    <section class="welcome" id="sobre">
      <div class="section-heading">
        <p class="eyebrow dark">Bem-vindo à nossa casa</p>
        <h2>Portugal à mesa,<br><em>São Luís no coração.</em></h2>
      </div>
      <div class="welcome-copy">
        <p>Peixes, frutos do mar e receitas tradicionais encontram ingredientes frescos em um ambiente casual, confortável e ideal para encontros.</p>
        <div class="facts">
          <span><strong>R$ 60–140</strong><small>faixa por pessoa</small></span>
          <span><strong>Todos os dias</strong><small>almoço e jantar</small></span>
        </div>
      </div>
    </section>

    <section class="features" aria-label="Destaques do restaurante">
      <article><span>01</span><h3>Boa mesa</h3><p>Pratos executivos bem servidos e opções especiais para cada ocasião.</p></article>
      <article><span>02</span><h3>Boa carta</h3><p>Grande seleção de vinhos, cervejas e coquetéis.</p></article>
      <article><span>03</span><h3>Bom acolhimento</h3><p>Equipe atenciosa em um ambiente sofisticado e acolhedor.</p></article>
    </section>

    <section class="menu-section" id="cardapio">
      <div class="menu-title">
        <p class="eyebrow">Mais pedidos</p>
        <h2>Uma seleção<br>da <em>nossa cozinha</em></h2>
      </div>
      <div class="menu-list">
        <?php foreach ($menu as $dish): ?>
          <article class="dish">
            <div><h3><?= htmlspecialchars($dish[0]) ?></h3><p><?= htmlspecialchars($dish[1]) ?></p></div>
            <strong><?= htmlspecialchars($dish[2]) ?></strong>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="review-section" id="avaliacoes">
      <p class="eyebrow dark">Quem nos visita</p>
      <blockquote>“A massa estava muito boa! O atendimento é excelente. Um lugar acolhedor para aproveitar uma boa refeição.”</blockquote>
      <p class="reviewer">Jonathan William · Avaliação no Google</p>
    </section>

    <section class="reservation" id="reserva">
      <div>
        <p class="eyebrow">Sua mesa espera por você</p>
        <h2>Reserve um momento<br><em>para saborear.</em></h2>
      </div>
      <form id="reservationForm" action="processar_reserva.php" method="post">
        <label>Nome<input name="nome" required autocomplete="name"></label>
        <label>Telefone<input name="telefone" required autocomplete="tel"></label>
        <div class="form-row">
          <label>Data<input name="data" type="date" required></label>
          <label>Horário<input name="hora" type="time" required></label>
        </div>
        <label>Pessoas<select name="pessoas"><option>2 pessoas</option><option>3 pessoas</option><option>4 pessoas</option><option>5+ pessoas</option></select></label>
        <button class="button button-light" type="submit">Solicitar reserva</button>
        <p class="form-status" aria-live="polite"></p>
      </form>
    </section>
  </main>

  <footer id="contato">
    <div class="footer-brand"><span class="brand-mark">TF</span><p>Tasquinha Ferreiro</p></div>
    <div><p class="footer-label">Endereço</p><address>R. dos Gaviões, 108-154<br>Ponta do Farol, São Luís – MA</address></div>
    <div><p class="footer-label">Contato</p><a href="tel:+559831818362">(98) 3181-8362</a><a href="https://www.google.com/maps/search/?api=1&query=Tasquinha+Ferreiro+Sao+Luis" target="_blank" rel="noreferrer">Ver no Google Maps ↗</a></div>
    <div><p class="footer-label">Horário</p><p>Almoço e jantar<br>Aberto até 00h</p></div>
  </footer>
  <script src="script.js"></script>
</body>
</html>
