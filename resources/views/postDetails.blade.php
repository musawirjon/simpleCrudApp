<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            
                @if($userPosts->count())
                    <div class="p-6 bg-white border-b border-gray-200">  
                        <h2>{{ $userPosts['title'] }}</h2>
                        <p class="ArticleBody">{{ substr(strip_tags($userPosts['content']), 0, 500) }}
                            {{ strlen(strip_tags($userPosts['content'])) > 50 ? "...ReadMore" : "" }} 
                        </p> 
                    </div>  
                    <form role="form" method="POST" action="{{ route('addComments') }}" id="reused_form">
                    @csrf
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="title">
                                    comment:</label>
                                <input class="form-control" type="text" name="comment" id="title" style="width:20%" />
                                <input type="hidden" name="id" value="{{ $userPosts['id'] }}"/  >
                            </div> 
                        </div> 
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-default pull-right" >Send →</button>
                            </div>
                        </div> 
                    </form>
                    @if(session()->has('message'))
                    <div id="success" class="alert alert-success" >
                            <h3>Success</h3>
                            {{ session()->get('message') }}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div id="error_message" class="alert alert-danger">
                            <h3>Error</h3>
                            {{ session()->get('error') }}
                    </div>
                    @endif
                @endif
                <ul>
                    <h2>Post Comments</h2><br>
                    @if(count($userPosts['comments']))
                    @foreach($userPosts['comments'] as $comment)
                        <li style="padding: 12px;border-bottom: 1px solid #ddd;width: 30%;margin-left: 12px;">
                            {{ $comment['comment'] }}
                        </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
