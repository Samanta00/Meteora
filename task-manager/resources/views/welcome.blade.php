<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="/css/Menu/app.css" rel="stylesheet">

</head>
<body class="antialiased">
    <div class='landingPage'>
        <Navbar />
        <section class='lp-inicio lp-sc-primario'>
            <div class='lp-sc-primario__conteudo'>
                <h1 class='lp-sc-primario__titulo'>
                    Happy Health: Plataforma de Gerenciamento e Cuidado do Câncer Bucal
                </h1>
                <p class='lp-sc-primario__texto'>
                    Pelo menos 97% eficaz, até 30x mais rápido em resultados Médicos
                </p>
                <a class="lp-sc-primario__botao" href="#lp-sc-card">Assine</a>
                <a class="lp-sc-primario__botao botao_secundario" href="#row-tabela-preco">Preço</a>
                <a class='nossos-precos__seta' href='#row-tabela-preco'><img src="{{ asset('path/to/seta') }}" alt="seta" />Preços</a>
            </div>
        </section>



        <section className='lp-corpo lp-sc-ajuda '>
            <h2 className='lp-titulo-secundario'>
                    Público alvo
            </h2>
                <div className='lp-corpo_centro'>
                    <div className='lp-card-ajuda'>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={clinicaParticulares} alt="" />
                            <h2 class='lp-titulo-secundario-card'>Clínicas particulares</h2>
                        </div>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={cuidadores} alt="" />
                            <h2 class='lp-titulo-secundario-card'>Pacientes e Cuidadores</h2>
                        </div>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={profissionalSaude} alt="" />
                            <h2 class='lp-titulo-secundario-card'>Profissionais de Saúde</h2>
                        </div>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={estudantePesquisadores} alt="" />
                            <h2 class='lp-titulo-secundario-card'>Estudantes e Pesquisadores</h2>
                        </div>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={ongs} alt="" />
                            <h2 class='lp-titulo-secundario-card'>Ongs</h2>
                        </div>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={instituicoesSaude} alt="" />
                            <h2 class='lp-titulo-secundario-card'>instituições de Saúde</h2>
                        </div>
                        <div class='card__ajuda'>
                            <img className='card__ajuda-img' src={maletaMedico} alt="" />
                            <h2 class='lp-titulo-secundario-card'>Governo e Órgãos de Saúde Pública</h2>
                        </div>
                    </div>
                </div>
            </section>

            <section className='lp-corpo lp-sc-precos'>
            <h2 className='lp-titulo-terciario'>
                    Preços
                </h2>
                <div className='lp-tabela'>

                    <div id='row-tabela-preco' className="lp-tabela-precos">
                        <div className="preco__plano">
                            <p className='price__titulo'>Plano Essencial</p>
                            <p className="price__preco">R$29.99/mês</p>
                            <ul className="features__preco">
                                <li>Todos os recursos</li>
                                <li>Suporte 24/7</li>
                            </ul>
                        </div>
                        <div className="preco__plano">
                            <p className='price__titulo'>Plano Avançado</p>
                            <p className="price__preco">R$59.99/mês</p>
                            <ul className="features__preco">
                                <li>Todos os recursos</li>
                                <li>Suporte 24/7</li>
                            </ul>
                        </div>
                        <div className="preco__plano">
                            <p className='price__titulo'>Plano Premium</p>
                            <p className="price__preco">R$99.99/mês</p>
                            <ul className="features__preco">
                                <li>Todos os recursos</li>
                                <li>Suporte 24/7</li>
                            </ul>
                        </div>
                    </div>
                    <button className="buy-button__preco ">Teste Agora</button>
                </div>
            </section>

    </div>
</body>
</html>
