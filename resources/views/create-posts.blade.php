<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }}
        </h2> 
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-3" id="form_container">
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
                            <h2>Post content</h2>
                            <p>
                                Please write content for the post, It will be shown on the home screen some one can write comments for it, you will see in then in comments section, and 
                                you will be notified for every comment on the email address you provided while creating an account!
                            </p>
                            <form role="form" method="POST" action="{{ route('addPost') }}" id="reused_form">
                            @csrf
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label for="title">
                                            title:</label>
                                        <input class="form-control" type="text" name="title" id="title" />
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="content">
                                            Content:</label>
                                        <textarea class="form-control" type="textarea" name="content" id="content" maxlength="6000" rows="7"></textarea>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <button type="submit" class="btn btn-lg btn-default pull-right" >Send →</button>
                                    </div>
                                </div>

                            </form>
                            <div id="success_message" style="width:100%; height:100%; display:none;">
                                <h3>Post created successfully!</h3>
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
