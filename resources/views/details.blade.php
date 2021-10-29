@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ $content->title }}</div>

                    <div class="card-body">
                        <img src="{{asset("storage/img/$content->image_name") }}" alt="bitch" class="homepageimg">
                        <p>{{$content->description}}</p>
                        <p>Creator: {{$username->name}}</p>
                        <div>
                        @foreach($tags as $tag)
                            <a>{{$tag}}</a>
                        @endforeach
                        </div>
                        <p>likes: {{$likeCount}}</p>
                        <form name="visibility-form" action="{{url('/handleLike')}}" method="POST">
                            @csrf
                            <input name="likeBtn" type="submit" value="@if(count($likeState) == 0) like @else liked @endif">
                            <input name="content_id" type="hidden" value="{{$content->id}}">
                        </form>
                    </div>
                </div>
                <a href="{{url("/")}}">< back</a>

            </div>
        </div>
    </div>
@endsection
