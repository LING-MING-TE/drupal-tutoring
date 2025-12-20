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

/* @mahipro/parts/settings/settings.html.twig */
class __TwigTemplate_89a7630bc8cbc5d44d6171ad85bb05d1 extends Template
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
        if ((($tmp = ($context["fontawesome_five"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mahipro/fontawesome5"), "html", null, true);
            yield "
";
        }
        // line 4
        if ((($tmp = ($context["fontawesome_six"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 5
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mahipro/fontawesome6"), "html", null, true);
            yield "
";
        }
        // line 7
        if ((($tmp = ($context["bootstrapicons"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mahipro/bootstrap-icons"), "html", null, true);
            yield "
";
        }
        // line 10
        yield "
<style>
.container {
  max-width: ";
        // line 13
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["container_width"] ?? null), "html", null, true);
        yield "px;
}
";
        // line 15
        if ((($context["header_width"] ?? null) == "header_width_full")) {
            // line 16
            yield ".header .container {
  max-width: 100%;
}
";
        }
        // line 20
        if ((($context["main_width"] ?? null) == "main_width_full")) {
            // line 21
            yield ".highlighted .container,
.main-wrapper .container {
  max-width: 100%;
}
";
        }
        // line 26
        yield "
";
        // line 27
        if ((($context["footer_width"] ?? null) == "footer_width_full")) {
            // line 28
            yield ".footer .container {
  max-width: 100%;
}
";
        }
        // line 32
        if ((($tmp = ($context["highlight_author_comment"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 33
            yield ".by-node-author {
  box-shadow: 0 0 0.4rem var(--color-primary);
}
";
        }
        // line 37
        yield "</style>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["fontawesome_five", "fontawesome_six", "bootstrapicons", "container_width", "header_width", "main_width", "footer_width", "highlight_author_comment"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@mahipro/parts/settings/settings.html.twig";
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
        return array (  114 => 37,  108 => 33,  106 => 32,  100 => 28,  98 => 27,  95 => 26,  88 => 21,  86 => 20,  80 => 16,  78 => 15,  73 => 13,  68 => 10,  62 => 8,  60 => 7,  54 => 5,  52 => 4,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@mahipro/parts/settings/settings.html.twig", "/var/www/html/web/themes/mahipro/templates/parts/settings/settings.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1];
        static $filters = ["escape" => 2];
        static $functions = ["attach_library" => 2];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
