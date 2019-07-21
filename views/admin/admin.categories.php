{% extends "_skeleton.php" %}
{% block main %}
<div class='page_header'>
<div class='page_title'>Admin:Categories</div>
<div class='page_desc'>View, edit or add categories</div>
</div>
<div class='tabular'>
<div class='tab-menu'><span{% if post==0 %} class='t-menu-active'{% endif %}>View</span><span{% if post==1 %} class='t-menu-active'{% endif %}>Add category</span></div>
<div class='tab-con'>
<span{% if post==0 %} class='t-active'{% endif %}>
{% spaceless %}
<div class='admin-cats'>
{% for cat in cats %}
<a href='/admin/cat/{{ cat.name|url_encode }}' class='a-cat' style='background:linear-gradient(90deg, #{{ cat.color }} 0%, #{{ cat.color }} 35%, rgba(0,212,255,1) 100%)'>{{ cat.name }}</a>
{% endfor %}
</div>
{% endspaceless %}
</span>
<span{% if post==1 %} class='t-active'{% endif %}>
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
</div></span>
</div></div>
{% endblock %}