{% extends "skeleton.php" %}
{% block main %}
<div class='loader'><span></span></div>
<div class='r_header'>
<span class='r_title'></span>
<span class='r_author'></span>
</div>
<div class='game'>
<div class='game-left'>

<div class='chat'>
<div class='chat-head'>Room chatbox</div>
<div class='chat-body'></div>
<div class='chat-bar'>
<form>
<input type='text' class='chat-mbar' placeholder='Your message'/>
<input type='submit' value='Send'/>
</form>
</div>
</div>

</div>
<div class='game-content'>center</div>
<div class='game-right'>
<div class='game-users-h'>Players</div>
<div class='game-users'></div>
</div>
</div>
{% endblock main %}