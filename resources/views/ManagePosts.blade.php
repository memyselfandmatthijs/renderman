@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <table class="table">
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <a href="{{url("/details/$post->id")}}">details</a>
                                    </td>
                                    <td>
                                        <a href="{{url("/modify/$post->id")}}">modify</a>
                                    </td>
                                    <td>
                                        <a href="{{url("/delete/$post->id")}}">delete</a>
                                    </td>
                                    <td>
                                        <form name="visibility-form" action="{{url('/handleActive')}}" method="POST">
                                            @csrf
                                            <input name="activeBtn" type="submit" value="@if($post->active == 1) invisible @else visible @endif">
                                            <input name="id" type="hidden" value="{{$post->id}}">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        <br><br>
                        <a href="{{url('/new_post')}}">New Post</a>
                </div>
        </div>
    </div>
</div>
@endsection
