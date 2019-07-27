{% extends "skeleton.php" %}
{% block main %}
<div class='mail-v'>You are already a game master in another room. <a href='/room/{{ rid }}'>Click here to join {{ rname }}</a></div>
{% endblock %}