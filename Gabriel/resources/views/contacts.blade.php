@include('includes.head')
@include('includes.header')

<main>
<section class="page-hero">
    <div class="container">
        <p class="section-kicker">@lang('messages.contacts')</p>
        <h1>@lang('messages.send_message')</h1>
    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="contact-card">
            <form class="form-contact" action="{{ route('send.email') }}" method="POST">
                @csrf
                <label for="name">@lang('messages.name')</label>
                <input type="text" name="name" class="form-control" placeholder="@lang('messages.name_placeholder')" id="name" required>
            
                <label for="email">@lang('messages.email')</label>
                <input type="email" name="email" class="form-control" placeholder="@lang('messages.email_placeholder')" id="email" required>
            
                <label for="phone">@lang('messages.phone')</label>
                <input type="text" name="phone" class="form-control" placeholder="@lang('messages.phone_placeholder')" id="phone">
            
                <label for="message">@lang('messages.message')</label>
                <textarea id="message" name="message" class="form-control" placeholder="@lang('messages.message_placeholder')" required></textarea>
            
                <div class="form-actions">
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-envelope"></i> @lang('messages.send_email')
                    </button>
                    <button type="button" onclick="sendWhatsAppMessage(this)" class="btn btn-success" data-message-prefix="@lang('messages.whatsapp_message_prefix')">
                        <i class="fab fa-whatsapp"></i> @lang('messages.send_whatsapp')
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="site-section social-section">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-12 col-md-4">
                <a class="social-card linkedin" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-linkedin"></i> @lang('messages.contact_linkedin')
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="social-card whatsapp" href="https://wa.me/+5541987694868?text=@lang('messages.contact_whatsapp_prefill')" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i> @lang('messages.contact_whatsapp')
                </a>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="social-card instagram" href="https://www.instagram.com/oliveiragabee_/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i> @lang('messages.contact_instagram')
                </a>
            </div>
        </div>
    </div>
</section>
</main>

@include('includes.footer')
