{% extends "skeleton.php" %}
{% block main %}
<div class='form_container'>
{% if error %}
<div class='form-error'>{{ error }}</div>
{% endif %}
<form action='' method='POST'>
<span><label for='name'>Username/Email</label>
<input type='text' name='name' placeholder='Your username/email' value='{{ form.name }}'/>
</span>
<span><label for='pass'>Password</label>
<input type='password' name='pass' placeholder='Your password' value='{{ form.pass }}'/>
</span>
<input type='hidden' value='{{ csrf }}' name='csrf'/>
<span><input type='submit' value='Login'/></span>
</form>
<div class='form_info'><span>Forgot your password? Reset it <a href='/user/reset/'>here</a></div>
</div>
{% endblock %}