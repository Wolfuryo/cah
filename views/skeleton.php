<!DOCTYPE html>
<html>
<head>
<title>Cards against humanity</title>
<link rel='stylesheet' type='text/css' href='/assets/css/main.css'/>
</head>
<body>
<header>
<div class='site'>
<div class='name'><a href='/'>Diss me</a></div>
</div>
<nav>
<a href='/'>Homepage</a>
<a href='/blog'>Blog</a>

{% if user.logged==false %}
<a href='/user/login'>Login</a>
<a href='/user/register'>Create an account</a>
{% endif %}

{% if user.logged %}
<a href='/user/{{ user.id }}' class='con-as'>Connected as {{ user.name }}</a>
<a href='/user/logout'>Logout</a>
{% endif %}

</nav>
</header>
{% block main %}
<div class='index-desc'>
<span>Epic rap battles with strangers</span>
</div>
{% endblock %}
<script src='/assets/js/main.js'></script>
</body>
</html>