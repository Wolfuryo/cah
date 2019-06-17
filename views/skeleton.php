<!DOCTYPE html>
<html>
<head>
<title>Diss me</title>
<link rel='stylesheet' type='text/css' href='/assets/css/main.css'/>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class='features'>
<div class='feat'>
<span class='feat-title'>Lyrics analysis</span>
<span class='feat-desc'>We automatically analyze the lyrics to decide a winner</span>
</div>
<div class='feat'>
<span class='feat-title'>Go against your friends</span>
<span class='feat-desc'>Prove you're the best</span>
</div>
<div class='feat'>
<span class='feat-title'>Discuss on the forum</span>
<span class='feat-desc'>Talk about rap or other subjects you're interested in</span>
</div>
</div>
bla
<span class='start-i'><a href='rooms'>Start</a></span>
{% endblock %}
<script src='/assets/js/js.php?c={{ controller }}&m={{ method }}'></script>
</body>
</html>