<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* register.php */
class __TwigTemplate_a752564718ca3aeef14f6f57c06dadfeb1fca0003e5e7a9d3dba29844dee6791 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "skeleton.php";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("skeleton.php", "register.php", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class='form_container'>
";
        // line 4
        if (($context["error"] ?? null)) {
            // line 5
            echo "<div class='form-error'>";
            echo twig_escape_filter($this->env, ($context["error"] ?? null), "html", null, true);
            echo "</div>
";
        }
        // line 7
        echo "<form action='' method='POST'>
<span><label for='name'>Username</label>
<input type='text' name='name' placeholder='Your username' value='";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "name", [], "any", false, false, false, 9), "html", null, true);
        echo "'/>
</span>
<span><label for='pass'>Password</label>
<input type='password' name='pass' placeholder='Your password' value='";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "pass", [], "any", false, false, false, 12), "html", null, true);
        echo "'/>
</span>
<span><label for='email'>Email</label>
<input type='email' name='email' placeholder='Your email' value='";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 15), "html", null, true);
        echo "'/>
</span>
<input type='hidden' name='csrf' value='";
        // line 17
        echo twig_escape_filter($this->env, ($context["csrf"] ?? null), "html", null, true);
        echo "'/>
<span><input type='submit' value='Login'/></span>
</form>
</div>
";
    }

    public function getTemplateName()
    {
        return "register.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 17,  77 => 15,  71 => 12,  65 => 9,  61 => 7,  55 => 5,  53 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "register.php", "/opt/lampp/htdocs/views/register.php");
    }
}
