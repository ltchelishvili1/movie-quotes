<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        <h1 class="text-center  text-5xl block mb-2  font-bold  text-blue-200">Create Quote</h1>
        <form method="POST" action="{{route('quote.store',[$movie])}}" class="mt-5 w-1/6" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title_en"  />
            <x-form.input name="title_ka"  />
            <x-form.input name='thumbnail' type='file'/>
            <x-form.button>Create</x-form.button>
        </form>
    </div>
</x-layout>