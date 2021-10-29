@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($deep_validation >= 3)
                <div class="card">
                    <div class="card-header">New post</div>

                    <div class="card-body">
                        <form name="new-post-form" action="{{url('/finished_post')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="title">Title:</label>
                            <input id="title" name="title" type="text">
                            <br><br>

                            <label for="description">Description:</label>
                            <input id="description" name="description" type="text">
                            <br><br>

                            <label for="image">Upload image:</label>
                            <input id="image" name="image" type="file">
                            <br><br>

                            <div id="list1" class="dropdown-check-list" tabindex="100">
                                <span class="anchor">Select tags</span>
                                <ul class="items">
                                    @foreach($tags as $tag)
                                    <li><input name="tags[{{$tag->id}}]" type="checkbox" value="{{$tag->id}}"/> {{$tag->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br><br>
                            <input type="submit" value="save">
                        </form>
                    </div>

            @elseif($deep_validation)
               <div class="card">
                   <div class="card-header">What a pity</div>

                   <div class="card-body">
                       Unfortunately for you, its required to have a total of 3 liked posts to post something yourself.
                       <br>
                       You currently have {{$deep_validation}} posts liked.
                   </div>
               </div>
            @endif

            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script src="{{ asset('js/checklist.js') }}"></script>
@endsection
