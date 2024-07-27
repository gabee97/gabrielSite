@include('includes.head')
@include('includes.header')

<div class="row row-division row-division-2">
    <div class="col-md-7 text-center">
        <h4 class="text-uppercase small-space">Sobre Mim</h4>
        <p>Em 2015, dei o primeiro passo na emocionante jornada da tecnologia ao me matricular na faculdade de Sistemas de Informação. Foi lá que tive meu primeiro contato com a programação e descobri que gostava de "falar com máquinas".</p>
        <p>Na faculdade, o foco era todo em Java. Mas em 2016, conheci o PHP e foi amor à primeira vista! Entrei no mercado de trabalho e não parei mais de codar com PHP. A simplicidade e praticidade do PHP conquistaram meu coração de desenvolvedor.</p>
        <p>No meio do caminho, resolvi dar mais uma chance para o Java e fiz uma pós-graduação. A intenção era entrar no mercado de trabalho com Java, mas eu já estava tão envolvido com o PHP que não consegui me desligar. Pelo menos ganhei muito conhecimento no processo!</p>
        <p>Hoje, sou um profissional altamente qualificado, com um profundo conhecimento na área de desenvolvimento. Estou sempre buscando aprender mais e evoluir a cada dia. Afinal, nessa área, a gente não pode parar nem por um segundo!</p>
    </div>
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/code-pc.jpg') }}" class="rounded-circle image-index" alt="Imagem Code">
    </div>
</div>
<div class="row row-division text-white bg-dark align-items-center">
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/it-pc.jpg') }}" class="rounded-circle image-index" alt="Imagem PC">
    </div>
    <div class="col-md-7">
        <h4 class="text-uppercase small-space text-center">Meus Principios</h4>
        <p class="light-strong text-uppercase">Qualidade<p>
        <p class="topic">Acredito que a qualidade deve estar presente em todas as etapas do desenvolvimento. Desde a codificação até a entrega do produto final, meu objetivo é sempre garantir que o trabalho seja feito com precisão e excelência, resultando em soluções robustas e eficientes.</p>
        <p class="light-strong text-uppercase">Inovação<p>
        <p class="topic">Estou sempre em busca de novas ideias e abordagens para resolver problemas. Acredito que a inovação é essencial para o crescimento e sucesso de qualquer projeto. Estou comprometido em explorar novas tecnologias e metodologias para criar soluções mais eficazes e criativas.</p>
        <p class="light-strong text-uppercase">Colaboração e Trabalho em Equipe<p>
        <p class="topic">O sucesso de um projeto muitas vezes depende da capacidade de trabalhar bem com outras pessoas. Acredito no poder da colaboração, comunicação clara e na diversidade de ideias para alcançar resultados inovadores e de alta qualidade. Sou dedicado a construir um ambiente de trabalho positivo e produtivo.</p>
    </div>
</div>

@include('includes.footer')
