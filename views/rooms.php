{% extends "skeleton.php" %}
{% block main %}
<div class='page_header'>
<div class='page_title'>Game rooms</div>
<div class='page_desc'>Pick a room or create a new one</div>
</div>
<div class='page_content'>
{% if user.logged %}
<div class='r_create'><a href='/rooms/create'>Create a room</a></div>
{% else %}
<div class='rc_info'>You have to <a href='/user/login'>Login</a> to create a room</div>
{% endif %}

{% if rooms %}
{% for room in rooms %}
<div class='room'>
<div class='room-name'>{{ room.name }}</div>
<div class='room-author'>{{ room.creator_id }}</div>
</div>
{% endfor %}
{% else %}
<div class='r_error'>No rooms available. Create one yourself</div>
{% endif %}
</div>
{% endblock %}