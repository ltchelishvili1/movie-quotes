<x-layout>
  
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <h1 class="text-center  text-5xl block mb-2  font-bold  text-blue-200">Create Movie</h1>
        <form method="POST" action="{{route('movies.store')}}" class="mt-5 w-1/6 ">
            @csrf
            <x-form.input name="name_en"  />
            <x-form.input name="name_ka"  />
            <x-form.button>Create</x-form.button>
        </form>
    </div>
</x-layout>