@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
{{-- # Hello! --}}
# こんにちは!
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{-- Regards,<br> --}}
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
{{-- If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below
into your web browser: [{{ $actionUrl }}]({!! $actionUrl !!}) --}}
{{ $actionText }}ボタンが利用できない場合は、以下のURLをコピー&ペーストしてブラウザから直接アクセスしてください。
[{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent
