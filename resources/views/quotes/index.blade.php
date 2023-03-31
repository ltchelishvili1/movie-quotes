<x-layout>
    <div class="flex flex-col items-center">
        <img class="h-96 rounded-lg" src='https://nostal.ge/wp-content/uploads/2018/07/jariskacis-mama-.png' />
        <p class="text-5xl pt-16 text-white max-w-6xl">{{$quote->quote}}</p>
        <a class="text-5xl pt-28 text-white underline" href="#">{{$quote->movie->name}}</a>
    </div>
</x-layout>