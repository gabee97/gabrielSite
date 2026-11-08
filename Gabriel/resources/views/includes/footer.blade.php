    <footer class="footer">
        <div class="container text-center">
            <span>&copy; @lang('messages.gabriel-complete-name')</span>
            <div class="footer-links">
                <a class="link text-white" href="https://github.com/gabee97" target="_blank" rel="noopener noreferrer">GitHub</a>
                <a class="link text-white" href="https://www.linkedin.com/in/gabriel-oliveira-gop1997/" target="_blank" rel="noopener noreferrer" aria-label="@lang('messages.contact_linkedin')"><i class="fab fa-linkedin"></i></a>
                <a class="link text-white" href="https://wa.me/5541987694868?text=@lang('messages.contact_whatsapp_prefill')" target="_blank" rel="noopener noreferrer" aria-label="@lang('messages.contact_whatsapp')"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>

    <script defer src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>

</body>
</html>
