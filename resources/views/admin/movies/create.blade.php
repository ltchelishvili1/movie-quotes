<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <h1 class="text-center  text-5xl block mb-2  font-bold  text-blue-200">{{strtoupper(__("validation.add_movies"))}}</h1>
        <form method="POST" action="{{route('movies.store')}}" class="mt-5 w-1/6 ">
            @csrf
            <a class="bg-gray-100 p-4 rounded-lg" href="{{route('adminpanel')}}">{{__('validation.back_to_movies')}}</a>
            <x-form.input name="name_en"  />
            <x-form.input name="name_ka"  />
            <x-form.button>{{__("validation.create")}}</x-form.button>
        </form>
    </div>
</x-layout>