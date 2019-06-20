<!DOCTYPE html>
<html>
<head>
<title>Anime quiz</title>
<link rel='stylesheet' type='text/css' href='/assets/css/main.css'/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
<div class='site'>
<div class='name'><a href='/'>AnimeQuiz</a></div>
</div>
<nav>
<a href='/'>Homepage</a>
<a href='/rooms'>Rooms</a>

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
<div class='admin-wrap'>
<div class='admin-nav'><a href='/admin/categories'>Categories</a><a href='/admin/questions/'>Questions</a><a href='/admin/users'>Users</a></div>
<div class='admin-content'>
{% block main %}
{% endblock %}
</div>
</div>
{% block footer %}
{% if user.level==1 %}
<div class='admin-link'><a href='/admin'><i class="material-icons">settings</i></a></div>
{% endif %}
{% endblock %}
<script src='/assets/js/js.php?c={{ controller }}&m={{ method }}'></script>
</body>
</html>