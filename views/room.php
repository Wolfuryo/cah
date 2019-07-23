{% extends "skeleton.php" %}
{% block main %}
<div class='loader'><span></span></div>
<div class='r_header'>
<span class='r_title'></span>
<span class='r_author'></span>
</div>
<div class='game'>
<div class='game-left'>left side</div>
<div class='game-content'>center</div>
<div class='game-right'>
<div class='game-users-h'>Players</div>
<div class='game-users'></div>
</div>
</div>

{% if added==1 %}
was not in room, added here
{% endif %}
{% if added==2 %}
was in another room, not added here
{% endif %}
{% if added==3 %}
already here
{% endif %}
{% endblock main %}