<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <h1 class="text-center  text-5xl block mb-2  font-bold  text-blue-200">{{__("validation.add_quotes")}}</h1>
        <a class="bg-gray-100 p-4 rounded-lg" href="{{route("adminquotes")}}">{{__('validation.back_to_quotes')}}</a>
        <form method="POST" action="{{route('quotes.store')}}" class="mt-5 w-1/6" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title_en"  />
            <x-form.input name="title_ka"  />
            <x-form.input name='thumbnail' type='file'/>
            <select class="rounded w-full h-10 mt-4" name="movie_id" id="movie_id" required>
                @foreach ($movies as $movie)
                <option value={{ $movie->id }}>
                    {{ $movie->name }}</option>
                @endforeach
            </select>
            <x-form.button>{{__("validation.create")}}</x-form.button>
        </form>
        
    </div>
</x-layout>