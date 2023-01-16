@extends('layouts.app')
@section('title', 'index page')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            <form action="{{route('posts')}}" method="post">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                 boder-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                 placeholder="Post Something!"></textarea>

                 @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                    </div>
                 @enderror

                 <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Register
                    </button>
                 </div>
            </form>

        </div>
    </div>

@endsection
