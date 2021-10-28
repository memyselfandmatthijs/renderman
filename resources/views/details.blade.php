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
                    </div>
                </div>
                <a href="{{url("/")}}">< back</a>

            </div>
        </div>
    </div>
@endsection
