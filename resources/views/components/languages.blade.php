<div class="h-screen fixed flex flex-col  top-1/2 h-100vh ml-12 ">
    <div class="-translate-y-1/2">
        <a href="{{ route('set-language', 'en') }}"
            class="mb-4 rounded-full flex items-center justify-center  w-12 h-12 {{'en' === App::getLocale() ? 'bg-white' : ''}}">en</a>
        <a href="{{ route('set-language','ka') }}"
            class="mb-4 rounded-full flex items-center justify-center w-12 h-12 text-black {{'ka' === App::getLocale() ? 'bg-white' : ''}}">ka</a>
    </div>
</div>