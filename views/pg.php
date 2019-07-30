{% extends "skeleton.php" %}
{% block main %}
{% if show %}

{% else %}
<div class='mail-v'>Admin-only</div>
{% endif %}
{% endblock %}