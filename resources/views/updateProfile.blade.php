@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <div class="card">
                    <div class="card-header">Edit Profile</div>

                    <div class="card-body">
                        <form name="updateProfile" action="{{url('/saveProfile')}}" method="POST">
                            @csrf

                            <label for="name">Name</label>
                            <input name="name" type="text" value="{{$user->name}}">

                            <br><br>

                            <label for="email">Email:</label>
                            <input name="email" type="text" value="{{$user->email}}">

                            <br><br>

                            <input type="submit" value="save">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
