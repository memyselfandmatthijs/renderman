@extends('layouts.app');

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add tags</div>

                <div class="card-body">
                    <form name="new-tag-form" action="{{'/save_tag'}}" method="POST">
                        @csrf
                        <label for="tag">tagname:</label>
                        <input id="tag" name="tag" type="text" required>
                        <input type="submit" value="save">
                        <p>{{$status}}</p>
                    </form>
                    <br>
                    <p>existing tags:</p>
                    <ul>
                        @foreach($tags as $tag)
                            <li>{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>



@endsection
