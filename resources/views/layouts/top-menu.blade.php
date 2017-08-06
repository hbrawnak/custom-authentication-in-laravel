<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills pull-right">
            <li role="presentation" {{ Request::is('/') ? ' class="active"' : null }}><a href="/">Home</a></li>
            <li role="presentation" {{ Request::is('/login') ? ' class="active"' : null }}><a href="/login">Login</a></li>
            <li role="presentation" {{ Request::is('/register') ? ' class="active"' : null }}><a href="/register">Register</a></li>
        </ul>
    </nav>
    <h3 class="text-muted">Advance laravel</h3>
</div>