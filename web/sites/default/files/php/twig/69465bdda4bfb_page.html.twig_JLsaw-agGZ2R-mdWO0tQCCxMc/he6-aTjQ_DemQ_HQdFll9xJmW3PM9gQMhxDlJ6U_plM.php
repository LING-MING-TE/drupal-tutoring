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

/* themes/mahipro/templates/layout/page.html.twig */
class __TwigTemplate_28c67f6bd6e40d1ec63ed307f170d4ed extends Template
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
        // line 34
        yield from $this->load("@mahipro/parts/header.html.twig", 34)->unwrap()->yield($context);
        // line 35
        yield from $this->load("@mahipro/parts/highlighted.html.twig", 35)->unwrap()->yield($context);
        // line 36
        yield "<div id=\"main-wrapper\" class=\"main-wrapper\">
  <div class=\"container\">
    <div class=\"main-container\">
      <main id=\"main\" class=\"page-content\">
        <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 41
        yield "        ";
        if ((($context["is_front"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content_home", [], "any", false, false, true, 41))) {
            // line 42
            yield "          ";
            yield from $this->load("@mahipro/parts/content_home.html.twig", 42)->unwrap()->yield($context);
            // line 43
            yield "        ";
        }
        // line 44
        yield "        ";
        yield from $this->load("@mahipro/parts/content_top.html.twig", 44)->unwrap()->yield($context);
        // line 45
        yield "        ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 45), "html", null, true);
        yield "
        ";
        // line 46
        yield from $this->load("@mahipro/parts/content_bottom.html.twig", 46)->unwrap()->yield($context);
        // line 47
        yield "      </main>
      ";
        // line 48
        yield from $this->load("@mahipro/parts/sidebar-left.html.twig", 48)->unwrap()->yield($context);
        // line 49
        yield "      ";
        yield from $this->load("@mahipro/parts/sidebar-right.html.twig", 49)->unwrap()->yield($context);
        // line 50
        yield "    </div> ";
        // line 51
        yield "  </div> ";
        // line 52
        yield "</div>";
        // line 53
        if ((($tmp = ($context["sliding_sidebar"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 54
            yield "  ";
            yield from $this->load("@mahipro/parts/sidebar-sliding.html.twig", 54)->unwrap()->yield($context);
        }
        // line 56
        yield from $this->load("@mahipro/parts/footer.html.twig", 56)->unwrap()->yield($context);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["is_front", "page", "sliding_sidebar"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/mahipro/templates/layout/page.html.twig";
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
        return array (  93 => 56,  89 => 54,  87 => 53,  85 => 52,  83 => 51,  81 => 50,  78 => 49,  76 => 48,  73 => 47,  71 => 46,  66 => 45,  63 => 44,  60 => 43,  57 => 42,  54 => 41,  48 => 36,  46 => 35,  44 => 34,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/mahipro/templates/layout/page.html.twig", "/var/www/html/web/themes/mahipro/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 34, "if" => 41];
        static $filters = ["escape" => 45];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                [],
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
