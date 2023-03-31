<x-layout>
    <div class="flex flex-col items-center ">
        <div class="flex flex-col max-w-screen-lg">
            <h1 class="text-white text-5xl mt-20 mb-20 bg-blue w-screen-lg">{{$movie->name}}</h1>
            @foreach ($movie->quotes as $quote)
            <img style="max-w-screen-lg" src="https://nostal.ge/wp-content/uploads/2018/07/jariskacis-mama-.png"
                alt="{{$quote->title}}" />
            <p class='text-4xl bg-white p-10 mb-20'>{{$quote->title}}</p>
            @endforeach
        </div>
    </div>
</x-layout>