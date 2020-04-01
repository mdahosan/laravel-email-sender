@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
{{--            [logo]: {{ 'https://pondit.com/ui/frontend/img/logo.png' }} "Logo"--}}
{{--            ![Some option text][logo]--}}

{{--            [logo]: {{asset('/logo.png')}} "Logo"--}}
            PONDIT.COM
        @endcomponent
    @endslot
    # {{ $data['introduction'] }}

    {{-- Body --}}
    {{ $data['message'] }}
    <!-- Body here -->

    {{-- Subcopy --}}
{{--    @slot('subcopy')--}}
{{--        @component('mail::subcopy')--}}
{{--            <!-- subcopy here -->--}}

Thanks,

{{ $data['thanks_text'] }}
{{--        @endcomponent--}}
{{--    @endslot--}}


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
            © {{ date('Y') }} {{ config('app.name') }}
        @endcomponent
    @endslot
@endcomponent

