<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <form method="POST" action="{{route('movies.update', [$movie])}}" class="mt-10 w-1/6 ">
            @csrf
            @method('PATCH')
            <a class="bg-gray-100 p-4 rounded-lg" href="{{route('adminpanel')}}">{{__('validation.back_to_movies')}}</a>
            <x-form.input name="name_en" :value="old('name',$movie->getTranslation('name', 'en'))" />
            <x-form.input name="name_ka" :value="old('name',$movie->getTranslation('name', 'ka'))" />
            <x-form.button>{{__("validation.update")}}</x-form.button>

        </form>
    </div>
</x-layout>