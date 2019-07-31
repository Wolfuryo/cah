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

<div class='room-ain'>You are already a part of room <a href='/room/{{ rid }}'>{{ rname }}</a>. If you were in a game, you will lose points. If you were a game master, you will lose double the ammount of points. Click <a href='' class='room-join'>here</a> to leave that room and join this one.</div>

{% endif %}


{% if ustate!=2 and canstart==1 %}
<div class='room-full'>
<span>You are the game master. Once there are at least 2 players in the room, including you, you can start the game.</span>
<span class='room-start'>Start the game</span>
</div>
{% endif %}

<div class='choose'>
<div class='choose-flex'>
<div class='choose-exp'>Choose 2 categories to get questions from</div>
{% for cat in cats %}
<span class='choice' data-id='{{ cat.id }}'>{{ cat.name }}</span>
{% endfor %}
</div>
<div class='choose-submit'>Submit your choices</div>
</div>

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