{% extends "_skeleton.php" %}
{% block main %}
<div class='page_header'>
<div class='page_title'>Admin:Users</div>
<div class='page_desc'>View and edit user information</div>
</div>
<div class='admin-users'>
<div class='u-pagintion'>

</div>
{% for user in users %}
<div class='admin-user'>
<div class='user-id'>{{ user.id }}</div>
<div class='user-name'>{{ user.name }}</div>
<div class='user-email'>{{ user.email }}</div>
<div class='user-level'>{{ user.level }}</div>
</div>
{% endfor %}
</div>
{% endblock %}