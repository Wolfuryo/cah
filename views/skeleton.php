{% spaceless %}
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
{% block main %}
<div class='index-desc'>
<span>Battle for fame and stickers</span>
</div>
<span class='start-i'><a href='rooms'>Pick an opponent</a></span>
<div class='features'>
<div class='feat'>
<span class='feat-title'>Multitude of categories</span>
<span class='feat-desc'>The questions will never bore you</span>
</div>
<div class='feat'>
<span class='feat-title'>Go against your friends</span>
<span class='feat-desc'>Prove you're the best</span>
</div>
<div class='feat'>
<span class='feat-title'>Discuss on the forum</span>
<span class='feat-desc'>Talk about anime or other subjects you're interested in</span>
</div>
</div>
{% endblock %}
{% block footer %}
{% if user.level==1 %}
<div class='admin-link'><a href='/admin'><i class="material-icons">settings</i></a></div>
{% endif %}
{% endblock %}
{% block ably %}
{% endblock %}
<script src='/assets/js/js.php?c={{ controller }}&m={{ method }}'></script>
</body>
</html>
{% endspaceless %}