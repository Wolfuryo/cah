{% extends "_skeleton.php" %}
{% block main %}
<div class='page_header'>
<div class='page_title'>Admin:Category {{ cat }}</div>
<div class='page_desc'>View/modify/delete category and questions</div>
</div>
<div class='tabular'>
<div class='tab-menu'><span class='t-menu-active'>View questions</span><span>Add question</span></div>
<div class='tab-con'>
<span class='t-active'>Questions</span>
<span>
<div class='form_container'>
{% if error %}
<div class='form-error'>{{ error }}</div>
{% endif %}
<form action='' method='POST'>
<span><label for='name'>Question</label>
<input type='text' name='name' placeholder='Question' value='{{ form.name }}'/>
</span>
<span><label for='ans1'>Correct answer</label>
<input type='text' name='ans1' placeholder='1st answer(correct)' value='{{ form.ans1 }}'/>
</span>
<span><label for='ans2'>2nd answer</label>
<input type='text' name='ans2' placeholder='2nd answer(wrong)' value='{{ form.ans2 }}'/>
</span>
<span><label for='ans3'>3rd answer</label>
<input type='text' name='ans3' placeholder='3rd anwer(wrong)' value='{{ form.ans3 }}'/>
</span>
<input type='hidden' value='{{ csrf }}' name='csrf'/>
<span><input type='submit' value='Add'/></span>
</form>
</div>
</span>
</div>
</div>
{% endblock %}