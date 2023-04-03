<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <form method="POST" action="{{route('quotes.update',[$quote->movie,$quote])}}" class="mt-10 w-1/6 " enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title_en" :value="old('title',$quote->getTranslation('title', 'en'))" />
            <x-form.input name="title_ka" :value="old('title',$quote->getTranslation('title', 'ka'))" />
            <x-form.input name='thumbnail' type='file' :value="old('thumbnail',$quote->thumbnail)"  />
            <img src="{{asset('storage/' . $quote->thumbnail)}}" alt="" class="rounded-xl mt-6" width="200"> 
            <x-form.button>Update</x-form.button>

        </form>
    </div>
</x-layout>