<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen flex flex-col items-center justify-center">
        <img class="h-96 rounded-lg" src='https://nostal.ge/wp-content/uploads/2018/07/jariskacis-mama-.png' />
        <p class="text-5xl pt-16 text-white max-w-6xl">{{$quote->title}}</p>
        <a class="text-5xl pt-28 text-white underline" href="movie/{{$quote->movie->slug}}">{{$quote->movie->name}}</a>
    </div>
</x-layout>