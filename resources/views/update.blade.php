@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <form name="update-post-form" action="{{url("/finished_update_post/$post->id")}}" method="POST">
                            @csrf

                            <label for="title">Title:</label>
                            <input id="title" name="title" type="text" value="{{$post->title}}">
                            <br><br>

                            <label for="description">Description:</label>
                            <input id="description" name="description" type="text" value="{{$post->description}}">
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
                </div>
            </div>
        </div>

@endsection

@section('pagescript')
     <script src="{{ asset('js/checklist.js') }}"></script>
@endsection
