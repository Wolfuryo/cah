{% extends "skeleton.php" %}
{% block main %}
<div class='form_container'>
{% if error %}
<div class='form-error'>{{ error }}</div>
{% endif %}
<form action='' method='POST'>
<span><label for='name'>Username</label>
<input type='text' name='name' placeholder='Your username' value='{{ form.name }}'/>
</span>
<span><label for='pass'>Password</label>
<input type='password' name='pass' placeholder='Your password' value='{{ form.pass }}'/>
</span>
<span><label for='email'>Email</label>
<input type='email' name='email' placeholder='Your email' value='{{ form.email }}'/>
</span>
<input type='hidden' name='csrf' value='{{ csrf }}'/>
<span><input type='submit' value='Login'/></span>
</form>
<div class='form_info'>An email will be sent to verify that you are the owner of the email address</div>
</div>
{% endblock %}