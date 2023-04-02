<x-layout>
    <div class="flex flex-col items-center justify-center h-screen ">
        <table class=" divide-y divide-gray-200 border rounded-3xl">
            <tbody class="bg-gray-300  divide-y divide-gray-200">
                @foreach ($movies as $movie)
                <tr >
                    <td class="px-4 py-4">
                        <div class="flex items-center">
                            <div class="text-4xl font-medium text-gray-900">
                                <a href="/">
                                    {{ $movie->name }}
                                </a>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-4 whitespace-nowrap text-right text-4xl font-medium">
                        <a href="{{ route('movie.edit', [$movie]) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>

                    <td class="px-4 py-4 whitespace-nowrap text-right text-4xl font-medium">
                        <form method="POST" action="/">
                            @csrf
                            @method('DELETE')

                            <button class="text-4xl text-gray-400">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
