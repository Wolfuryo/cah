{% extends "_skeleton.php" %}
{% block main %}
<div class='page_header'>
<div class='page_title'>Admin:Categories</div>
<div class='page_desc'>View, edit or add categories</div>
</div>
<div class='form_container'>
{% if error %}
<div class='form-error'>{{ error }}</div>
{% endif %}
<form action='' method='POST'>
<span><label for='name'>Category name</label>
<input type='text' name='name' placeholder='Category name' value='{{ form.name }}'/>
</span>
<input type='hidden' value='{{ csrf }}' name='csrf'/>
<span><input type='submit' value='Add'/></span>
</form>
</div>
{% spaceless %}
<div class='admin-cats'>
{% for cat in cats %}
<a href='/admin/cat/{{ cat.name }}' class='a-cat' style='background:#{{ cat.color }}'>{{ cat.name }}</a>
{% endfor %}
</div>
{% endspaceless %}
{% endblock %}