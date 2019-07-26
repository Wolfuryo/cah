{% extends "skeleton.php" %}
{% block main %}
<div class='loader'><span></span></div>
<div class='r_header'>
<span class='r_title'></span>
<span class='r_author'></span>
</div>
<div class='game'>
<div class='game-left'>

<div class='chat'>
<div class='chat-head'>Room chatbox</div>
<div class='chat-body'><div class='mini-loader'></div></div>
<div class='chat-bar'>
<form>
<input type='text' class='chat-mbar' placeholder='Your message'/>
<input type='submit' value='Send'/>
</form>
</div>
</div>

</div>
<div class='game-content'>

{% if ustate==2 %}

<div class='room-ain'>You are already a part of room <a href='/room/{{ rid }}'>{{ rname }}</a>. If you were in a game, you will lose points. If you were a game master, you will lose double the ammount of points. Click <a href=''>here</a> to leave that room and join this one.</div>

{% endif %}
</div>
<div class='game-right'>
<div class='game-users-h'>Players</div>
<div class='game-users'></div>
</div>
</div>
{% endblock main %}
{% block ably %}
<script src="//cdn.ably.io/lib/ably.min-1.js"></script>
{% endblock %}