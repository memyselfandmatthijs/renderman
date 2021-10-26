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

                            <input type="submit" value="save">
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
