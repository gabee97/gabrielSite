@if(session('success'))
<div class="alert alert-success" role="status">{{ session('success') }}</div>
@endif
@if(session('error'))
<div class="alert alert-danger" role="alert">{{ session('error') }}</div>
@endif
@if($errors->any())
<div class="alert alert-danger" role="alert"><p>@lang('portfolio.validation_error')</p><ul>
@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
</ul></div>
@endif
<form class="form-contact" action="{{ route('send.email') }}" method="POST" data-loading="@lang('portfolio.sending')">
@csrf
<div class="honeypot" aria-hidden="true"><label for="website">Website</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
@foreach(['name' => ['text', 120, 'name'], 'email' => ['email', 254, 'email'], 'phone' => ['tel', 30, 'tel']] as $field => $options)
<label for="{{ $field }}">{{ __('messages.'.$field) }}</label>
<input id="{{ $field }}" name="{{ $field }}" type="{{ $options[0] }}" maxlength="{{ $options[1] }}" autocomplete="{{ $options[2] }}" class="form-control" value="{{ old($field) }}" @if($field !== 'phone') required @endif @error($field) aria-invalid="true" aria-describedby="{{ $field }}-error" @enderror>
@error($field)<p id="{{ $field }}-error" class="text-danger">{{ $message }}</p>@enderror
@endforeach
<label for="message">@lang('messages.message')</label>
<textarea id="message" name="message" class="form-control" maxlength="4000" required @error('message') aria-invalid="true" aria-describedby="message-error" @enderror>{{ old('message') }}</textarea>
@error('message')<p id="message-error" class="text-danger">{{ $message }}</p>@enderror
<div class="form-actions">
<button type="submit" class="btn btn-dark">@lang('messages.send_email')</button>
<button type="button" onclick="sendWhatsAppMessage(this)" class="btn btn-success" data-message-prefix="@lang('messages.whatsapp_message_prefix')">@lang('messages.send_whatsapp')</button>
</div><p class="form-status" role="status"></p>
</form>
