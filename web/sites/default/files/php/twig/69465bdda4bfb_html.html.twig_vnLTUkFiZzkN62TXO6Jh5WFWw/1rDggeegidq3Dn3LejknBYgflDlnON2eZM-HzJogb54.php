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

/* themes/mahipro/templates/layout/html.html.twig */
class __TwigTemplate_03de5f5546129b1e758e7b42aa317522 extends Template
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
        // line 28
        $context["body_classes"] = [(((($tmp =         // line 29
($context["logged_in"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("user-logged-in") : ("user-guest")), (((($tmp =  !        // line 30
($context["root_path"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("frontpage") : (("inner-page path-" . \Drupal\Component\Utility\Html::getClass(($context["root_path"] ?? null))))), (((($tmp =         // line 31
($context["node_type"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("page-type-" . \Drupal\Component\Utility\Html::getClass(($context["node_type"] ?? null)))) : ("")), ((( !CoreExtension::getAttribute($this->env, $this->source,         // line 32
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 32) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 32))) ? ("no-sidebar") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 33
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 33) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 33))) ? ("one-sidebar sidebar-left") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 34
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 34) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 34))) ? ("one-sidebar sidebar-right") : ("")), (((CoreExtension::getAttribute($this->env, $this->source,         // line 35
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 35) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 35))) ? ("two-sidebar") : (""))];
        // line 38
        yield "<!DOCTYPE html>
<html";
        // line 39
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["html_attributes"] ?? null), "html", null, true);
        yield ">
  <head>
    <head-placeholder token=\"";
        // line 41
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    <title>";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, ($context["head_title"] ?? null), " | "));
        yield "</title>
    ";
        // line 43
        if ((($context["font_src"] ?? null) == "local")) {
            // line 44
            yield "      <link rel=\"preload\" as=\"font\" href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
            yield "/fonts/poppins.woff2\" type=\"font/woff2\" crossorigin>
      <link rel=\"preload\" as=\"font\" href=\"";
            // line 45
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (($context["base_path"] ?? null) . ($context["directory"] ?? null)), "html", null, true);
            yield "/fonts/plus-jakarta-sans.woff2\" type=\"font/woff2\" crossorigin>
    ";
            // line 46
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mahipro/googlefontslocal"), "html", null, true);
            yield "
    ";
        } elseif ((        // line 47
($context["font_src"] ?? null) == "googlecdn")) {
            // line 48
            yield "      <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
      <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
      <link href=\"https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700&family=Poppins&display=swap\" rel=\"stylesheet\">
    ";
        }
        // line 52
        yield "    <css-placeholder token=\"";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    <js-placeholder token=\"";
        // line 53
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
";
        // line 54
        if ((($tmp = ($context["insert_head"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 55
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["head_code"] ?? null));
            yield "
";
        }
        // line 57
        if ((($context["color_scheme"] ?? null) == "color_custom")) {
            // line 58
            yield "  ";
            yield from $this->load("@mahipro/parts/settings/color.html.twig", 58)->unwrap()->yield($context);
        }
        // line 60
        if ((($tmp = ($context["css_extra"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 61
            yield "<style>
";
            // line 62
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["css_code"] ?? null), "html", null, true);
            yield "
</style>
";
        }
        // line 65
        yield "  </head>
  <body";
        // line 66
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["body_classes"] ?? null)], "method", false, false, true, 66), "html", null, true);
        yield ">
";
        // line 67
        if ((($tmp = ($context["insert_body_start"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 68
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["body_start_code"] ?? null));
            yield "
";
        }
        // line 70
        yield "    ";
        // line 74
        yield "    <a href=\"#main-content\" class=\"visually-hidden focusable\">
      ";
        // line 75
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        yield "
    </a>
    ";
        // line 77
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page_top"] ?? null), "html", null, true);
        yield "
    ";
        // line 78
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page"] ?? null), "html", null, true);
        yield "
    ";
        // line 79
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["page_bottom"] ?? null), "html", null, true);
        yield "
    <js-bottom-placeholder token=\"";
        // line 80
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["placeholder_token"] ?? null), "html", null, true);
        yield "\">
    ";
        // line 81
        yield from $this->load("@mahipro/parts/settings/settings.html.twig", 81)->unwrap()->yield($context);
        // line 82
        if ((($tmp = ($context["insert_body_end"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 83
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["body_end_code"] ?? null));
            yield "
";
        }
        // line 85
        yield "  </body>
</html>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["logged_in", "root_path", "node_type", "page", "html_attributes", "placeholder_token", "head_title", "font_src", "base_path", "directory", "insert_head", "head_code", "color_scheme", "css_extra", "css_code", "attributes", "insert_body_start", "body_start_code", "page_top", "page_bottom", "insert_body_end", "body_end_code"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/mahipro/templates/layout/html.html.twig";
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
        return array (  177 => 85,  171 => 83,  169 => 82,  167 => 81,  163 => 80,  159 => 79,  155 => 78,  151 => 77,  146 => 75,  143 => 74,  141 => 70,  135 => 68,  133 => 67,  129 => 66,  126 => 65,  120 => 62,  117 => 61,  115 => 60,  111 => 58,  109 => 57,  103 => 55,  101 => 54,  97 => 53,  92 => 52,  86 => 48,  84 => 47,  80 => 46,  76 => 45,  71 => 44,  69 => 43,  65 => 42,  61 => 41,  56 => 39,  53 => 38,  51 => 35,  50 => 34,  49 => 33,  48 => 32,  47 => 31,  46 => 30,  45 => 29,  44 => 28,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/mahipro/templates/layout/html.html.twig", "/var/www/html/web/themes/mahipro/templates/layout/html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 28, "if" => 43, "include" => 58];
        static $filters = ["clean_class" => 30, "escape" => 39, "safe_join" => 42, "raw" => 55, "t" => 75];
        static $functions = ["attach_library" => 46];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include'],
                ['clean_class', 'escape', 'safe_join', 'raw', 't'],
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
