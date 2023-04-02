@props(['name'])


<label  class="block mb-2 uppercase font-bold text-s text-blue-500"
        for = "{{$name}}"
>
    {{ucwords($name)}}            
</label>