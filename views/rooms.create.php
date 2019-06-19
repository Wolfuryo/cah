{% extends "skeleton.php" %}
{% block main %}
<div class='page_header'>
<div class='page_title'>Create a room</div>
<div class='page_desc'>destroy your enemies</div>
</div>
<div class='form_container create_room_form'>
{% if error %}
<div class='form-error'>{{ error }}</div>
{% endif %}
<form action='' method='POST'>
<span><label for='name'>Room name</label>
<input type='text' name='name' placeholder='Room name' value='{{ form.name }}'/>
</span>
<input type='hidden' name='csrf' value='{{ csrf }}'/>
<span><input type='submit' value='Login'/></span>
</form>
</div>
{% endblock %}