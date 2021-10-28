@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="card">
                    <div class="card-header">filter</div>

                    <div class="card-body">
                        <form name="filter-form" action="{{url('/filterresults')}}" method="POST">
                            @csrf
                            <label for="tag">Tag:
                                <ul class="items">
                                    @foreach($tags as $tag)
                                        <li>
                                            <input name="tags[{{$tag->id}}]" type="checkbox" value="{{$tag->id}}"> {{$tag->name}}
                                        </li>
                                    @endforeach
                                </ul>
                            <input type="submit" value="search">
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">

                <div class="card">
                    @if(isset($usedTags) && count($posts) >= 0)
                    <div class="card-header">results for @foreach($usedTags as $tag) "{{$tag}}", @endforeach</div>
                    @endif

                    @if(count($posts) == 0)
                    <div class="card-body">
                            <p>there are no posts related to these tags</p>
                    </div>
                    @endif
                </div>
                <br>

                @foreach($posts as $post)
                    <div class="card">
                        <div class="card-header">{{ $post->title }}</div>

                        <div class="card-body">
                            <img src="{{asset("storage/img/$post->image_name") }}" alt="bitch" class="homepageimg">
                            <a href="/details/{{$post->id}}">Post details -></a>

                        </div>
                    </div>
                    <br>

                @endforeach

                    </div>
                </div>
            </div>


@endsection
