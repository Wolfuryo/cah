{% extends "skeleton.php" %}
{% block main %}
{% spaceless %}
<div class='page_header'>
<div class='page_title'>Game rooms</div>
<div class='page_desc'>Pick a room or create a new one</div>
</div>
<div class='page_content'>
{% if user.logged %}
<div class='r_create'><a href='/rooms/create'>Create a room</a></div>
{% else %}
<div class='rc_info'>You have to <a href='/user/login'>Login</a> to create a room or play in one</div>
{% endif %}

{% if rooms %}
<div class='rooms'>
{% for room in rooms %}

<a href='/room/{{ room.id }}' class='room{% if loop.length%4==1 and loop.last %}
 room100
{% endif %}'>
<div class='room-name'>{{ room.name }}</div>
<div class='room-author'>{{ room.creator_name }}</div>
</a>
{% endfor %}
</div>
{% else %}
<div class='r_error'>No rooms available. Create one yourself</div>
{% endif %}
</div>
{% endspaceless %}
{% endblock %}