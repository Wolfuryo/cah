<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel='stylesheet' type='text/css' href='/assets/css/main.css'/>
</head>
<body>
<header>
<div class='site'>
<div class='name'><a href='/'>Devsland</a></div>
<div class='desc'>Making your ideas into reality</div>
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
<main>
{% block main %}{% endblock %}
</main>
<script src='/assets/js/main.js'></script>
</body>
</html>