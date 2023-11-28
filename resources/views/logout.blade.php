<!-- resources/views/layouts/app.blade.php -->

<!-- Other content... -->

@auth
    <form action="{{ route('user.logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <form action="{{ route('homepage') }}" method="get">
        @csrf
        <button type="submit">Go To HomePage</button>
    </form>
@endauth
