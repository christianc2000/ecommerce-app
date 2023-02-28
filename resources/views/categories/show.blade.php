<x-app-layout>
    <div class="container py-8 px-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <figure class="mb-4">
            <img class="w-full h-80 object-cover object-center" src="{{asset('storage/'.$category->image)}}" alt="">
        </figure>

        @livewire('category-filter',['category'=>$category])
    </div>
</x-app-layout>
