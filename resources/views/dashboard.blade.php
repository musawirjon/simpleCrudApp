<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($userPosts))
                    @foreach($userPosts as $post)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2>{{ $post['title'] }}</h2>
                        <p>
                            {{ $post['content'] }}
                        </p>
                    </div>
                    @endforeach
                @else
                No post found! please create one
                <x-nav-link :href="route('createPosts')" :active="request()->routeIs('createPosts')">
                    {{ __('Create Posts') }}
                </x-nav-link>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
