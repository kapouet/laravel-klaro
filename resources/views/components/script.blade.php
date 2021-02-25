@if (isset($name))
    @if (isset($src))
        <script type="text/plain"
                data-type="application/javascript"
                data-src="{{ $src }}"
                data-name="{{ $name }}"></script>
    @elseif (isset($slot))
        <script type="text/plain"
                data-type="application/javascript"
                data-name="{{ $name }}">
            {{ $slot}}
        </script>
    @endif
@else
    @if (! empty(config('klaro.services')))
        <script>
            window.kapouet = window.kapouet || {};
            window.kapouet.klaro = {
                config: {!! json_encode(config('klaro')) !!},
                lang: '{{ app()->getLocale() }}',
                translations: {!! json_encode(trans('klaro::klaro')) !!}
            };
        </script>
        <script src="{{ klaro_mix('js/klaro.js', 'klaro') }}"></script>
    @endif
@endif
