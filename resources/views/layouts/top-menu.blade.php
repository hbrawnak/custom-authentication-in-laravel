<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            @if(Sentinel::check())
                <li role="presentation">
                    <form action="/logout" method="post" id="logout-form">
                        {{ csrf_field() }}

                        <input class="btn btn-info" type="submit" value="Logout">
                    </form>
                </li>
            @else
                <li role="presentation"><a href="/login">Login</a></li>
                <li role="presentation"><a href="/register">Register</a></li>
            @endif
        </ul>
    </nav>
    <h3 class="text-muted">
        @if(Sentinel::check())
            Hello, {{ Sentinel::getUser()->first_name }}
        @else
        Advance laravel
        @endif
    </h3>
</div>