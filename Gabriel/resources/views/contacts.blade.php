@include('includes.head')
@include('includes.header')

<div class="row row-division row-division-2 align-items-center">
    <div class="col-md-3 text-center"></div>
    <div class="col-md-6 text-center">
        <p class="h1-higher">@lang('messages.send_message')</p>
        <form class="form-inline form-contact">
            <label for="name">@lang('messages.name')</label>
            <input type="text" class="form-control" placeholder="@lang('messages.name_placeholder')" id="name">
            
            <label for="email">@lang('messages.email')</label>
            <input type="email" class="form-control" placeholder="@lang('messages.email_placeholder')" id="email">
            
            <label for="phone">@lang('messages.phone')</label>
            <input type="text" class="form-control" placeholder="@lang('messages.phone_placeholder')" id="phone">
            
            <label for="message">@lang('messages.message')</label>
            <textarea id="message" class="form-control" placeholder="@lang('messages.message_placeholder')"></textarea>
            
            <button type="submit" class="btn btn-secondary">
                <i class="fas fa-envelope"></i> @lang('messages.send_email')
            </button>
            <button type="button" onclick="sendWhatsAppMessage()" class="btn btn-success">
                <i class="fab fa-whatsapp"></i> @lang('messages.send_whatsapp')
            </button>
        </form>
    </div>
    <div class="col-md-3 text-center"></div>
</div>

<div class="row row-division row-division-2">
    <div class="row">
        <div class="col-md-3 text-center"></div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h4><a class="link linkedin" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank">
                        <i class="fab fa-linkedin"></i> @lang('messages.contact_linkedin')</a></h4>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h4><a class="link whatsapp" href="https://wa.me/+5541987694868?text=Olá Gabriel!%0AAchei seu perfil pelo seu site e gostaria de falar contigo" target="_blank">
                        <i class="fab fa-whatsapp"></i> @lang('messages.contact_whatsapp')</a></h4>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h4><a class="link instagram" href="https://www.instagram.com/oliveiragabee_/" target="_blank">
                        <i class="fab fa-instagram"></i> @lang('messages.contact_instagram')</a></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-center"></div>
    </div>
</div>

@include('includes.footer')
