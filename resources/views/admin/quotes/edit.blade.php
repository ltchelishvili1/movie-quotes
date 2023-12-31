<x-layout>

    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <a class="bg-gray-100 p-4 rounded-lg" href="{{route("adminquotes")}}">{{__('validation.back_to_quotes')}}</a>
        <form method="POST" action="{{route('quotes.update',[$quote])}}" class="mt-10 w-1/6 "
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title_en" :value="old('title',$quote->getTranslation('title', 'en'))" />
            <x-form.input name="title_ka" :value="old('title',$quote->getTranslation('title', 'ka'))" />
            <x-form.input name='thumbnail' type='file' :value="old('thumbnail', $quote->thumbnail)" />
            <img src="{{asset('storage/' . $quote->thumbnail)}}" alt="" class="pb-4 rounded-xl mt-6" width="200">
            <select class="rounded w-full h-10" name="movie_id" id="movie_id" required>
                @foreach ($movies as $movie)
                <option {{ $quote->movie_id == $movie->id ? 'selected' : '' }} value={{ $movie->id }}>
                    {{ $movie->name }}</option>
                @endforeach
            </select>
            <x-form.button>Update</x-form.button>

        </form>
    </div>
</x-layout>