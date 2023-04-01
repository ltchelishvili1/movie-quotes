<x-layout>
    <div class="flex flex-col items-center  w-full h-full h-screen justify-center ">
        
        <form method="POST" action="{{route('login.store')}}" class="mt-10 w-1/6 ">
            <h1 class="text-center  text-5xl block mb-2 uppercase font-bold  text-blue-500">Log In!</h1>
            @csrf
            <x-form.input name="email" type="email" autocomplete="username" />
            <x-form.input name="password" type="password" autocomplete="new-password" />
            <x-form.button>Log In</x-form.button>

        </form>
    </div>
</x-layout>