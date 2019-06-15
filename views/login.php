{% extends "skeleton.php" %}
{% block main %}
<div class='form_container'>
<form action='/' method='POST'>
<span><label for='name'>Username</label>
<input type='text' name='name' placeholder='Your username'/>
</span>
<span><label for='pass'>Password</label>
<input type='password' name='pass' placeholder='Your password'/>
</span>
<span><input type='submit' value='Login'/></span>
</form>
</div>
{% endblock %}