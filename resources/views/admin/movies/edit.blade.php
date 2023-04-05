<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <form method="POST" action="{{route('movies.update', [$movie])}}" class="mt-10 w-1/6 ">
            @csrf
            @method('PATCH')
            <x-form.input name="name_en" :value="old('name',$movie->getTranslation('name', 'en'))" />
            <x-form.input name="name_ka" :value="old('name',$movie->getTranslation('name', 'ka'))" />
            <x-form.button>{{__("validation.update")}}</x-form.button>

        </form>
    </div>
</x-layout>