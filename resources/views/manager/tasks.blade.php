<li role="presentation">
    <form action="/logout" method="post" id="logout-form">
        {{ csrf_field() }}

        <a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
    </form>
</li>