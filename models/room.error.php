{% extends "skeleton.php" %}
{% block main %}
<div class='info'>You are already the game master in a room.<a href='/room/{{ rid }}'>Click here to join your room:{{ room }}</a></div>
{% endblock %}