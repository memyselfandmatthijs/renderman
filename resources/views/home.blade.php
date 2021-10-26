@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($contents as $content)
                <div class="card">
                    <div class="card-header">{{ $content->title }}</div>

                    <div class="card-body">
                        <img src="{{asset("storage/img/$content->image_name") }}" alt="bitch" class="homepageimg">
                        <a href="url(/details/{{$content->id}})">Post details -></a>

                    </div>
                </div>
                <br>

            @endforeach

        </div>
    </div>
</div>
@endsection

