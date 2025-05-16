@include('includes.head')
@include('includes.header')

<div class="row text-white bg-dark row-division row-division-1">
    <div class="col-md-3 text-center"></div>
    <div class="col-md-6 text-center">
        <p class="h1-higher">@lang('messages.hello')</p>
        <p>@lang('messages.intro')</p>
    </div>
    <div class="col-md-3 text-center"></div>
</div>
<div class="row row-division row-division-2 align-items-center">
    <div class="col-md-7 text-center">
        <small>@lang('messages.first_of_all')...</small>
        <p class="h1-higher space">@lang('messages.about_me')</p>
        <p class="space">@lang('messages.about_me_description')</p>
        <a class="btn btn-dark" href="{{ route('about') }}"><i class="fas fa-angle-right"></i> @lang('messages.know_more') <i class="fas fa-angle-left"></i></a>
    </div>
    <div class="col-md-5 img-none-smart text-center">
        <img src="{{ asset('storage/5.jpeg') }}" class="rounded-circle image-index" alt="Imagem Gabriel">
    </div>
</div>
<div class="row row-division text-white bg-dark align-items-center">
    <div class="col-md-5 image-code p-0" style="background-image: url('{{ asset('storage/code.png') }}');">
    </div>
    <div class="col-md-7 text-center">
        <small>@lang('messages.not_less_important')...</small>
        <p class="h1-higher space text-uppercase">@lang('messages.skills_upper')</p>
        <p>@lang('messages.skills_description')</p>
        <p>@lang('messages.know_skills')</p>
    </div>
</div>
<div class="row row-division row-division-2 align-items-center">
    <div class="col-md-7 text-center">
        <small>@lang('messages.cant_forget')...</small>
        <p class="h1-higher space text-uppercase">@lang('messages.experiences_upper')</p>
        <p class="space">@lang('messages.experiences_description')</p>
        <a class="btn btn-dark" href="{{ route('experiences') }}"><i class="fas fa-briefcase"></i> @lang('messages.experiences') </i></a>
    </div>
    <div class="col-md-5 img-none-smart text-center">
        <img src="{{ asset('storage/computer.jpg') }}" class="rounded-circle image-index" alt="Imagem Computador">
    </div>
</div>
<div class="row text-white bg-dark row-division row-division-1">
    <div class="col-md-3 text-center"></div>
    <div class="col-md-6 text-center">
        <p class="h1-higher">@lang('messages.send_message')</p>
        <form class="form-inline form-contact" action="{{ route('send.email') }}" method="POST">
            @csrf
            <label for="name">@lang('messages.name')</label>
            <input type="text" class="form-control" placeholder="Digite seu nome" id="name">
            <label for="email">@lang('messages.email')</label>
            <input type="email" class="form-control" placeholder="Digite seu email" id="email">
            <label for="phone">@lang('messages.phone')</label>
            <input type="text" class="form-control" placeholder="Digite seu telefone" id="phone">
            <label for="message">@lang('messages.message')</label>
            <textarea id="message" class="form-control" placeholder="Digite sua mensagem"></textarea>
            <button type="submit" class="btn btn-secondary"><i class="fas fa-envelope"></i> @lang('messages.send_email')</button>
            <button type="button" onclick="sendWhatsAppMessage()" class="btn btn-success"><i class="fab fa-whatsapp"></i> @lang('messages.send_whatsapp')</button>
        </form>
    </div>
    <div class="col-md-3 text-center"></div>
</div>

@include('includes.footer')
