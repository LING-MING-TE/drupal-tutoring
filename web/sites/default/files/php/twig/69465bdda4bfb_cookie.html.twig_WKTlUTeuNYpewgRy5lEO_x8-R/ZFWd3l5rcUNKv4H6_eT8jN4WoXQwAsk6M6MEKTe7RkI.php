<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* @mahipro/parts/cookie.html.twig */
class __TwigTemplate_0799440351fa18455d3e1baecc0ac571 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mahipro/cookie_alert"), "html", null, true);
        yield "
<div class=\"cookiealert\" role=\"alert\">
  <div class=\"container\">
    <div class=\"cookiealert-container\">
      <div class=\"cookiealert-message text-center\">
        ";
        // line 6
        if ((($context["cookie_message_custom"] ?? null) != "")) {
            // line 7
            yield "          ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::striptags(($context["cookie_message_custom"] ?? null), "<p>,<div>,<span>,<a>,<img>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<em>,<strong>,<br>,<hr>,<i>,<mark>,<del>"));
            yield "
        ";
        } else {
            // line 9
            yield "          This site uses cookies. By continuing to browse the site you are agreeing to our use of cookies.
      ";
        }
        // line 11
        yield "      </div>";
        // line 12
        yield "      <div class=\"text-center\"><button type=\"button\" class=\"acceptcookies\" aria-label=\"Close\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("I agree"));
        yield "</button></div>";
        // line 13
        yield "    </div>";
        // line 14
        yield "  </div>";
        // line 15
        yield "</div>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["cookie_message_custom"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@mahipro/parts/cookie.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  74 => 15,  72 => 14,  70 => 13,  66 => 12,  64 => 11,  60 => 9,  54 => 7,  52 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@mahipro/parts/cookie.html.twig", "/var/www/html/web/themes/mahipro/templates/parts/cookie.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 6];
        static $filters = ["escape" => 1, "raw" => 7, "striptags" => 7, "t" => 12];
        static $functions = ["attach_library" => 1];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'raw', 'striptags', 't'],
                ['attach_library'],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
