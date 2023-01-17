@extends('layouts.admin')

@section('content')
    <div>


        <div class="mb-5">
            <a href="{{route('post.create')}}" class="btn btn-primary">Создать новый Пост</a>
        </div>

        <div>
            @foreach($posts as $post)
                <div>
                    <a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a>
                </div>
            @endforeach

            <div class="mt-3">
                {{$posts->withQueryString()->links()}}
            </div>
        </div>
    </div>
@endsection
