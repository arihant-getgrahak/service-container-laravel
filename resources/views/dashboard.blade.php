<div>
    <h1>Welcome {{Session::get('user')->name}}</h1>

    <a href="{{route('logout')}}">Logout</a>
</div>
