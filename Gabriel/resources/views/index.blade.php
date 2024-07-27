
@include('includes.head')
@include('includes.header')

<div class="row text-white bg-dark row-division row-division-1">
    <div class="col-md-3 text-center"></div>
    <div class="col-md-6 text-center">
        <p class="h1-higher">OLÁ, EU SOU O GABRIEL!</p>
        <p>Prazer em te ver por aqui! Sou supervisor de TI com mais de 7 anos de experiência, e minha paixão é transformar linhas de código em soluções incríveis. Atualmente, meu foco é em PHP, mas estou sempre explorando novas tecnologias e maneiras de inovar.</p>
    </div>
    <div class="col-md-3 text-center"></div>
</div>
<div class="row row-division row-division-2 align-items-center">
    <div class="col-md-7 text-center">
        <small>Primeiro de tudo...</small>
        <p class="h1-higher space">SOBRE MIM</p>
        <p class="space">Bem-vindo ao meu site currículo! Eu criei esse cantinho virtual para te mostrar um pouco da minha jornada nessa maluquice que é a programação.
            Se quiser saber um pouqinho mais sobre os perrengues e as aventuras que já passei nesse mundo, dá um clique nesse botão aí embaixo que eu te conto!</p>
        <a class="btn btn-dark"><i class="fas fa-angle-right"></i> SAIBA MAIS <i class="fas fa-angle-left"></i></a>
    </div>
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/5.jpeg') }}" class="rounded-circle image-index" alt="Imagem Gabriel">
    </div>
</div>
<div class="row row-division text-white bg-dark align-items-center">
    <div class="col-md-5 image-code p-0" style="background-image: url('{{ asset('storage/code.png') }}');">
    </div>
    <div class="col-md-7 text-center">
        <small>Não menos importante...</small>
        <p class="h1-higher space text-uppercase">@lang('messages.skills')</p>
        <p>Com mais de 7 anos de experiência na bagagem, eu sou um programador PHP que adora se aventurar em várias tecnologias. Além de dominar PHP, sou bem familiarizado com Laravel, MySQL, JavaScript, jQuery, Git e muitas outras ferramentas bacanas.</p>
        <p>Quer saber mais sobre as minhas super habilidades na programação? <a class="btn btn-secondary" href="{{ route('skills') }}">Clique aqui</a> que eu te conto tudo!</p>
    </div>
</div>
<div class="row row-division row-division-2 align-items-center">
    <div class="col-md-7 text-center">
        <small>E não posso esquecer...</small>
        <p class="h1-higher space text-uppercase">@lang('messages.experiences')</p>
        <p class="space">Desde meus primeiros passos como estagiário até o meu cargo atual como supervisor de TI, a paixão pela programação e a vontade de evoluir sempre me motivaram a continuar estudando e crescendo na área. Com mais de 7 anos de experiência, já passei por várias fases, vivi muita coisa e sempre em constante evolução</p>
        <a class="btn btn-dark" href="{{ route('experiences') }}"><i class="fas fa-briefcase"></i> MINHAS EXPERIÊNCIAS </i></a>
    </div>
    <div class="col-md-5 text-center">
        <img src="{{ asset('storage/computer.jpg') }}" class="rounded-circle image-index" alt="Imagem Computador">
    </div>
</div>
<div class="row text-white bg-dark row-division row-division-1">
    <div class="col-md-3 text-center"></div>
    <div class="col-md-6 text-center">
        <p class="h1-higher">ME ENVIE UMA MENSAGEM</p>
        <form class="form-inline form-contact">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" placeholder="Digite seu nome" id="name">
            <label for="email" class="">Email:</label>
            <input type="email" class="form-control" placeholder="Digite seu email" id="email">
            <label for="phone">Telefone:</label>
            <input type="text" class="form-control" placeholder="Digite seu telefone" id="phone">
            <label for="message">Mensagem:</label>
            <textarea id="message" class="form-control" placeholder="Digite sua mensagem"></textarea>
            <button type="submit" class="btn btn-secondary"><i class="fas fa-envelope"></i> Enviar Mensagem por Email</button>
            <button type="button" onclick="sendWhatsAppMessage()" class="btn btn-success"><i class="fab fa-whatsapp"></i> Enviar Mensagem por WhatsApp</button>
        </form>
    </div>
    <div class="col-md-3 text-center"></div>
</div>

@include('includes.footer')
