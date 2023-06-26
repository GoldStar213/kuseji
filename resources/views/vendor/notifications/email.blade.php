<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('おっと！')
@else
# @lang('こんにちは！')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)

お客様のアカウントのパスワードリセットをリクエストしたため、このメールをお送りしております。

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
パスワードをリセット
</x-mail::button>
@endisset

{{-- Outro Lines --}}


このパスワードリセットリンクは、60分後に有効期限切れとなります。<br>
パスワードリセットをリクエストしていない場合は、何もする必要はありません。


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "ボタンがクリックできない場合は、下のURLをコピーしてブラウザのアドレス欄に貼り付け、直接アクセスしてください。\n".
    'ブラウザでアクセス：',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
