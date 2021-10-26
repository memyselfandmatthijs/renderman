@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                        <input type="submit" value="save">
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
