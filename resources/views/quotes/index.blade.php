<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen flex flex-col items-center justify-center">
        @if (!empty($quote))
        @if($quote->thumbnail!=null)
        <img class="h-6xl w-6xl rounded-lg" src={{asset('storage/' . $quote->thumbnail)}}
        alt='as'/>
        @endif
            <p class="text-5xl pt-16 text-white max-w-6xl">{{$quote->title}}</p>
            <a class="text-5xl pt-28 text-white underline"
                href="{{route('movies.show', ['movie' => $quote->movie->id]);}}">{{$quote->movie->name}}</a> 
        @else
        <div class="bg-gray-500 p-4 rounded-lg">
            <p class="text-4xl text-gray-700">
                {{__("validation.movies_empty")}}
                @auth
                <a href="{{route('adminpanel')}}" class="text-blue-500 font-medium cursor-pointer hover:text-blue-600">{{__("validation.create")}}?</a>
                @else 
                @endauth
            </p>
        </div>
        @endif    
    </div>
</x-layout>