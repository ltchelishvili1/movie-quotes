<x-layout>

    <div class="flex flex-col items-center justify-center h-screen px-32 ">
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
                        <a href="{{route('quote.edit', [$quote->movie,$quote])}}" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>

                    <td class="px-4 py-4 whitespace-nowrap text-right text-4xl font-medium">
                        <form method="POST" action="{{route('quote.delete', [$quote->movie,$quote])}}">
                            @csrf
                            @method('DELETE')

                            <button class="text-4xl text-gray-400">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pt-4">
            <a href="{{route('quote.create',[$movie_id])}}" class="inline-block py-3 px-6 text-white font-bold bg-blue-500 rounded hover:bg-blue-600">
                Add New Quote
            </a>
        </div>

    </div>
    </div>
</x-layout>