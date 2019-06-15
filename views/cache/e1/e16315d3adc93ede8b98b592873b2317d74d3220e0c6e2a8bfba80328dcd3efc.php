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

/* skeleton.php */
class __TwigTemplate_3661597ca4e346e18f4f119ba0f3430824c078eba44555a85bc510574c21c0c3 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'main' => [$this, 'block_main'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel='stylesheet' type='text/css' href='/assets/css/main.css'/>
</head>
<body>
<header>
<div class='site'>
<div class='name'><a href='/'>Devsland</a></div>
<div class='desc'>Making your ideas into reality</div>
</div>
<nav>
<a href='/'>Homepage</a>
<a href='/blog'>Blog</a>
<a href='/user/login'>Login</a>
<a href='/user/register'>Create an account</a>
</nav>
</header>
<main>
";
        // line 21
        $this->displayBlock('main', $context, $blocks);
        // line 22
        echo "</main>
<script src='/assets/js/main.js'></script>
</body>
</html>";
    }

    // line 21
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "skeleton.php";
    }

    public function getDebugInfo()
    {
        return array (  69 => 21,  62 => 22,  60 => 21,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "skeleton.php", "/opt/lampp/htdocs/views/skeleton.php");
    }
}
