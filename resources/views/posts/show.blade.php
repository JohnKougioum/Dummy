@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <x-post :post="$post" />
        </div>
    </div>
        <div class="flex justify-center mt-5">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                @auth    
                    <form action="{{ route('comments', $post)}}" method="POST" class="mb-10">
                        @csrf
                        <div class="mb-4">
                            <label for="body" class="sr-only">Body</label>
                            <input type="text">
                            
                            <div class="flex justify-around">
                                <input type="text" name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-10/12 p-2 rounded-lg
                                @error('body') border-red-500 @enderror" placeholder="Add a comment" />
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Comment</button>

                                @error('body')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            
                        </div>
                    </form>
                @endauth

                <h1 class="mb-5 text-xl font-medium mb-1">Comments</h1>
                @foreach ($post->comments as $comments)
                <div class="mb-4">
                        <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $comments->user->username }}</a> <span class="text-gray-600 text-sm">{{ $comments->created_at->diffForHumans() }}</span>
                        <p class="mt-2">{{$comments->body}}</p>
                    </div>
            
                @endforeach
            </div>
        </div> 
    
@endsection