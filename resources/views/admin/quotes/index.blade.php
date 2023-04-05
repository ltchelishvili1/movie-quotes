<x-layout>

    <div class="flex flex-col items-center justify-center h-screen px-32 ">
        @if (!empty($quotes->count()))
        <table class=" divide-y divide-gray-200 border rounded-3xl">
            <tbody class="bg-gray-300 divide-y divide-gray-200">
                @foreach ($quotes as $quote)
                <tr>
                    <td class="px-4 py-4">
                        <div class="flex items-center">
                            <div class="text-4xl font-medium text-gray-900">
                                <a href="/">
                                    {{ $quote->title }}
                                </a>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-4">
                        <div class="flex items-center">
                            <div class="text-4xl font-medium text-gray-900">
                                <img class="h-48 w-48 rounded-lg"
                                src={{asset('storage/' . $quote->thumbnail)}} alt='as'/>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-4 whitespace-nowrap text-right text-4xl font-medium">
                        <a href="{{route('quotes.edit', [$quote->movie,$quote])}}" class="text-blue-500 hover:text-blue-600">{{__("validation.edit")}}</a>
                    </td>

                    <td class="px-4 py-4 whitespace-nowrap text-right text-4xl font-medium">
                        <form method="POST" action="{{route('quotes.delete', [$quote->movie,$quote])}}">
                            @csrf
                            @method('DELETE')

                            <button class="text-4xl text-gray-400">{{__("validation.delete")}}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-4xl text-gray-700">
            {{__("validation.quotes_empty")}}
        </p>
            @endif
        <div class="pt-4">
            <a class="bg-gray-100 p-4 rounded-lg" href="{{route('adminpanel')}}">{{__('validation.back_to_movies')}}</a>
          
          <a href="{{route('quotes.create',[$movie_id])}}" class="inline-block py-3 px-6 text-white font-bold bg-blue-500 rounded hover:bg-blue-600">
                {{__("validation.add_quotes")}}
            </a>
         
        </div>

    </div>
    </div>
</x-layout>