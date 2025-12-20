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

/* @mahipro/parts/header.html.twig */
class __TwigTemplate_534df0b04148823a23b66b3dbd3008b8 extends Template
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
        if ((($tmp = ($context["preloader"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "<div class=\"loader\">
  <div class=\"loader-inner\">
    <div class=\"loader-icon\">
      <span></span>
    </div>
  </div>
</div>
";
        }
        // line 10
        yield "<header class=\"header dark\">
  ";
        // line 11
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_top", [], "any", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 12
            yield "    <div class=\"header-top\">
      <div class=\"container\">
        <div class=\"header-top-block\">
          ";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_top", [], "any", false, false, true, 15), "html", null, true);
            yield "
        </div>
      </div>
    </div>
  ";
        }
        // line 20
        yield "  <div class=\"header-main ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = ($context["sticky_header"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("header-fixed") : ("")));
        yield "\">
    <div class=\"container\">
      <div class=\"header-main-container\">
        ";
        // line 23
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "          <div class=\"site-branding-region\">
            ";
            // line 25
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 25), "html", null, true);
            yield "
          </div> <!--/.site-branding -->
        ";
        }
        // line 28
        yield "        ";
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 28) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 28)) || ($context["sliding_sidebar"] ?? null))) {
            // line 29
            yield "          <div class=\"header-right\">
            ";
            // line 30
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 30)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 31
                yield "              <button class=\"mobile-menu-icon\" aria-label=\"Open main menu\" title=\"Open main menu\">
                <span></span>
                <span></span>
                <span></span>
              </button><!-- /mobile-menu -->
              <div class=\"primary-menu-wrapper\">
                <div class=\"menu-wrap\">
                  <button class=\"close-mobile-menu\" aria-label=\"close main menu\" title=\"close main menu\"><i class=\"icon-close\"></i></button>
                  ";
                // line 39
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 39), "html", null, true);
                yield "
                </div>
              </div><!-- /primary-menu-wrapper -->
            ";
            }
            // line 43
            yield "            ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 44
                yield "              <button class=\"search-icon\" aria-label=\"Open search form\" title=\"search\">
                <i class=\"icon-search\"></i>
              </button><!--/.search icon -->
              <div class=\"search-box\">
                <section class=\"search-box-close\" aria-label=\"Close Search form\"></section>
                <div class=\"container\">
                  <div class=\"search-box-content\">
                    ";
                // line 51
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 51), "html", null, true);
                yield "
                  </div>
                </div>
                <section class=\"search-box-close\" aria-label=\"Close Search form\"></section>
              </div><!--/.search-box -->
            ";
            }
            // line 56
            yield " <!-- end page.search_box -->
            ";
            // line 57
            if ((($tmp = ($context["sliding_sidebar"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 58
                yield "            <button class=\"sidebar-menu-icon\" aria-label=\"open sidebar\" title=\"open sidebar\">
              <span></span>
              <span></span>
              <span></span>
            </button><!-- /sidebar-menu-icon -->
            ";
            }
            // line 63
            yield "  
          </div><!--/.header-right -->
        ";
        }
        // line 66
        yield "      </div><!--/header-main-container -->
    </div><!--/container-->
  </div><!--/header-main-->
  ";
        // line 69
        if ((($tmp = ($context["sticky_header"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 70
            yield "  <div class=\"sticky-header-height\"></div>
  ";
        }
        // line 72
        yield "  ";
        if ((($context["is_front"] ?? null) && ($context["slider_show"] ?? null))) {
            // line 73
            yield "    ";
            yield from $this->load("@mahipro/parts/slider.html.twig", 73)->unwrap()->yield($context);
            // line 74
            yield "  ";
        } elseif (( !($context["is_front"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "page_header", [], "any", false, false, true, 74))) {
            // line 75
            yield "    <div class=\"page-header\">
      <div class=\"container\">
        ";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "page_header", [], "any", false, false, true, 77), "html", null, true);
            yield "
      </div><!--/container-->
    </div>
  ";
        }
        // line 81
        yield "</header>";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["preloader", "page", "sticky_header", "sliding_sidebar", "is_front", "slider_show"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@mahipro/parts/header.html.twig";
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
        return array (  187 => 81,  180 => 77,  176 => 75,  173 => 74,  170 => 73,  167 => 72,  163 => 70,  161 => 69,  156 => 66,  151 => 63,  143 => 58,  141 => 57,  138 => 56,  129 => 51,  120 => 44,  117 => 43,  110 => 39,  100 => 31,  98 => 30,  95 => 29,  92 => 28,  86 => 25,  83 => 24,  81 => 23,  74 => 20,  66 => 15,  61 => 12,  59 => 11,  56 => 10,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@mahipro/parts/header.html.twig", "/var/www/html/web/themes/mahipro/templates/parts/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1, "include" => 73];
        static $filters = ["escape" => 15];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
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
