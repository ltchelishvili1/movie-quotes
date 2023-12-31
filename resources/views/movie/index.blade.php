
<x-layout>
    <div class="flex flex-col items-center ">
        <div class="flex flex-col max-w-screen-lg">
            <h1 class="text-white text-5xl mt-20 mb-20 bg-blue w-screen-lg">{{$movie->name}}</h1>
            @foreach ($movie->quotes as $quote)
                @if($quote->thumbnail!=null)
                    <img class="h-[32rem]  rounded-lg" src={{asset('storage/' . $quote->thumbnail)}}
                alt='as'/>
                @endif
            <p class='text-4xl bg-white p-10 mb-20'>{{$quote->title}}</p>
            @endforeach
        </div>
    </div>
</x-layout>