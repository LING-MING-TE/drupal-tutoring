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

/* @mahipro/parts/footer.html.twig */
class __TwigTemplate_d36ec7fa18113024d401016f808ca4b8 extends Template
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
        yield "<footer class=\"footer dark\">
  <div class=\"container footer-container\">
    ";
        // line 3
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 3)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 4
            yield "      <section class=\"footer-top footer-region\">
        ";
            // line 5
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 5), "html", null, true);
            yield "
      </section>
    ";
        }
        // line 7
        yield "<!-- /footer-top -->
    ";
        // line 8
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "      <section class=\"footer-blocks footer-region\">
        ";
            // line 10
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 10), "html", null, true);
            yield "
      </section>
    ";
        }
        // line 12
        yield "<!-- /footer -->
    ";
        // line 13
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "      <section class=\"footer-bottom footer-region\">
        ";
            // line 15
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 15), "html", null, true);
            yield "
      </section>
    ";
        }
        // line 17
        yield "<!-- /footer-bottom -->
    ";
        // line 18
        if ((($context["copyright_text"] ?? null) || ($context["all_icons_show"] ?? null))) {
            // line 19
            yield "    <section class=\"footer-bottom-last footer-region\">
      ";
            // line 20
            if ((($tmp = ($context["copyright_text"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 21
                yield "        <div class=\"copyright\">
        ";
                // line 22
                if ((($context["copyright_text_custom"] ?? null) != "")) {
                    // line 23
                    yield "          ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::striptags(($context["copyright_text_custom"] ?? null), "<p>,<div>,<span>,<a>,<img>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<em>,<strong>,<br>,<hr>,<i>,<mark>,<ol>,<ul>,<li>"));
                    yield "
        ";
                } else {
                    // line 25
                    yield "          &copy; ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
                    yield " ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["site_name"] ?? null), "html", null, true);
                    yield ", All rights reserved.
        ";
                }
                // line 27
                yield "        </div><!--/copyright -->
      ";
            }
            // line 28
            yield " <!-- end if copyright -->
        ";
            // line 29
            if ((($tmp = ($context["all_icons_show"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 30
                yield "          <div class=\"footer-social\">
            ";
                // line 31
                yield from $this->load("@mahipro/parts/social.html.twig", 31)->unwrap()->yield($context);
                // line 32
                yield "          </div>
        ";
            }
            // line 33
            yield " <!-- end if all_icons_show -->
    </section><!-- /footer-bottom-last -->
    ";
        }
        // line 36
        yield "  </div><!-- /container -->
</footer>
";
        // line 38
        if ((($tmp = ($context["cookie_message"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "  ";
            yield from $this->load("@mahipro/parts/cookie.html.twig", 39)->unwrap()->yield($context);
        }
        // line 41
        if ((($tmp = ($context["scrolltotop_on"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "<div class=\"scrolltop\"><i class=\"icon-arrow-up size-large\"></i></div>
";
        }
        // line 44
        if ((($tmp = ($context["animated_content"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mahipro/animated-content"), "html", null, true);
            yield "
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "copyright_text", "all_icons_show", "copyright_text_custom", "site_name", "cookie_message", "scrolltotop_on", "animated_content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@mahipro/parts/footer.html.twig";
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
        return array (  157 => 45,  155 => 44,  151 => 42,  149 => 41,  145 => 39,  143 => 38,  139 => 36,  134 => 33,  130 => 32,  128 => 31,  125 => 30,  123 => 29,  120 => 28,  116 => 27,  108 => 25,  102 => 23,  100 => 22,  97 => 21,  95 => 20,  92 => 19,  90 => 18,  87 => 17,  81 => 15,  78 => 14,  76 => 13,  73 => 12,  67 => 10,  64 => 9,  62 => 8,  59 => 7,  53 => 5,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@mahipro/parts/footer.html.twig", "/var/www/html/web/themes/mahipro/templates/parts/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 3, "include" => 31];
        static $filters = ["escape" => 5, "raw" => 23, "striptags" => 23, "date" => 25];
        static $functions = ["attach_library" => 45];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
                ['escape', 'raw', 'striptags', 'date'],
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
