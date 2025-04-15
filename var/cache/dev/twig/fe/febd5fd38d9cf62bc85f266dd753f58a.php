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

/* front/camping/index.html.twig */
class __TwigTemplate_c6dc9f4a4b182545bbcf1b919663c64c extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/camping/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/camping/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "front/camping/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Camping Spots - CampConnect";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Camping Spots</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Camping Spots</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Search Start -->
    <div class=\"container-fluid booking mt-5 pb-5\">
        <div class=\"container pb-5\">
            <div class=\"bg-light shadow\" style=\"padding: 30px;\">
                <form action=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_index");
        yield "\" method=\"get\">
                    <div class=\"row align-items-center\" style=\"min-height: 60px;\">
                        <div class=\"col-md-10\">
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"keyword\" class=\"form-control p-4\" placeholder=\"Search Keyword\" value=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "request", [], "any", false, false, false, 31), "query", [], "any", false, false, false, 31), "get", ["keyword"], "method", false, false, false, 31), "html", null, true);
        yield "\">
                                    </div>
                                </div>
                                <div class=\"col-md-4\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"pays\" class=\"form-control p-4\" placeholder=\"Country\" value=\"";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 36, $this->source); })()), "request", [], "any", false, false, false, 36), "query", [], "any", false, false, false, 36), "get", ["pays"], "method", false, false, false, 36), "html", null, true);
        yield "\">
                                    </div>
                                </div>
                                <div class=\"col-md-4\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"ville\" class=\"form-control p-4\" placeholder=\"City\" value=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "request", [], "any", false, false, false, 41), "query", [], "any", false, false, false, 41), "get", ["ville"], "method", false, false, false, 41), "html", null, true);
        yield "\">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-2\">
                            <button class=\"btn btn-primary btn-block\" type=\"submit\" style=\"height: 47px; margin-top: -2px;\">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- Camping List Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Camping Spots</h6>
                <h1>Explore Camping Destinations</h1>
                ";
        // line 62
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "session", [], "any", false, false, false, 62), "get", ["user_id"], "method", false, false, false, 62)) {
            // line 63
            yield "                    <div class=\"mt-4\">
                        <a href=\"";
            // line 64
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_new");
            yield "\" class=\"btn btn-primary\">Add New Camping Spot</a>
                    </div>
                ";
        }
        // line 67
        yield "            </div>
            <div class=\"row\">
                ";
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["campings"]) || array_key_exists("campings", $context) ? $context["campings"] : (function () { throw new RuntimeError('Variable "campings" does not exist.', 69, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["camping"]) {
            // line 70
            yield "                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"package-item bg-white mb-2\">
                            <img class=\"img-fluid\" src=\"";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/camping_images/" . CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "image", [], "any", false, false, false, 72))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "nom", [], "any", false, false, false, 72), "html", null, true);
            yield "\">
                            <div class=\"p-4\">
                                <div class=\"d-flex justify-content-between mb-3\">
                                    <small class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "ville", [], "any", false, false, false, 75), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "pays", [], "any", false, false, false, 75), "html", null, true);
            yield "</small>
                                    <small class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateFin", [], "any", false, false, false, 76), "U") - $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateDeb", [], "any", false, false, false, 76), "U")) / 86400), "html", null, true);
            yield " days</small>
                                </div>
                                <a class=\"h5 text-decoration-none\" href=\"";
            // line 78
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 78)]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "nom", [], "any", false, false, false, 78), "html", null, true);
            yield "</a>
                                <p class=\"mt-2\">";
            // line 79
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "description", [], "any", false, false, false, 79)) > 100)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "description", [], "any", false, false, false, 79), 0, 100) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "description", [], "any", false, false, false, 79), "html", null, true)));
            yield "</p>
                                <div class=\"border-top mt-4 pt-4\">
                                    <div class=\"d-flex justify-content-between\">
                                        <h6 class=\"m-0\"><i class=\"fa fa-calendar text-primary mr-2\"></i>";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateDeb", [], "any", false, false, false, 82), "d M Y"), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateFin", [], "any", false, false, false, 82), "d M Y"), "html", null, true);
            yield "</h6>
                                        <h5 class=\"m-0\"><a href=\"";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 83)]), "html", null, true);
            yield "\" class=\"btn btn-primary btn-sm\">View Details</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            $context['_iterated'] = true;
        }
        // line 89
        if (!$context['_iterated']) {
            // line 90
            yield "                    <div class=\"col-12 text-center\">
                        <p>No camping spots found matching your criteria.</p>
                        ";
            // line 92
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
                // line 93
                yield "                            <p>Why not <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_new");
                yield "\">add a new camping spot</a>?</p>
                        ";
            }
            // line 95
            yield "                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['camping'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        yield "            </div>
        </div>
    </div>
    <!-- Camping List End -->
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "front/camping/index.html.twig";
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
        return array (  266 => 97,  259 => 95,  253 => 93,  251 => 92,  247 => 90,  245 => 89,  234 => 83,  228 => 82,  222 => 79,  216 => 78,  211 => 76,  205 => 75,  197 => 72,  193 => 70,  188 => 69,  184 => 67,  178 => 64,  175 => 63,  173 => 62,  149 => 41,  141 => 36,  133 => 31,  124 => 25,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Camping Spots - CampConnect{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Camping Spots</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Camping Spots</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Search Start -->
    <div class=\"container-fluid booking mt-5 pb-5\">
        <div class=\"container pb-5\">
            <div class=\"bg-light shadow\" style=\"padding: 30px;\">
                <form action=\"{{ path('app_camping_index') }}\" method=\"get\">
                    <div class=\"row align-items-center\" style=\"min-height: 60px;\">
                        <div class=\"col-md-10\">
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"keyword\" class=\"form-control p-4\" placeholder=\"Search Keyword\" value=\"{{ app.request.query.get('keyword') }}\">
                                    </div>
                                </div>
                                <div class=\"col-md-4\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"pays\" class=\"form-control p-4\" placeholder=\"Country\" value=\"{{ app.request.query.get('pays') }}\">
                                    </div>
                                </div>
                                <div class=\"col-md-4\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"ville\" class=\"form-control p-4\" placeholder=\"City\" value=\"{{ app.request.query.get('ville') }}\">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-2\">
                            <button class=\"btn btn-primary btn-block\" type=\"submit\" style=\"height: 47px; margin-top: -2px;\">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Search End -->

    <!-- Camping List Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Camping Spots</h6>
                <h1>Explore Camping Destinations</h1>
                {% if app.session.get('user_id') %}
                    <div class=\"mt-4\">
                        <a href=\"{{ path('app_camping_new') }}\" class=\"btn btn-primary\">Add New Camping Spot</a>
                    </div>
                {% endif %}
            </div>
            <div class=\"row\">
                {% for camping in campings %}
                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"package-item bg-white mb-2\">
                            <img class=\"img-fluid\" src=\"{{ asset('uploads/camping_images/' ~ camping.image) }}\" alt=\"{{ camping.nom }}\">
                            <div class=\"p-4\">
                                <div class=\"d-flex justify-content-between mb-3\">
                                    <small class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>{{ camping.ville }}, {{ camping.pays }}</small>
                                    <small class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>{{ (camping.dateFin|date('U') - camping.dateDeb|date('U')) / 86400 }} days</small>
                                </div>
                                <a class=\"h5 text-decoration-none\" href=\"{{ path('app_camping_show', {'id': camping.id}) }}\">{{ camping.nom }}</a>
                                <p class=\"mt-2\">{{ camping.description|length > 100 ? camping.description|slice(0, 100) ~ '...' : camping.description }}</p>
                                <div class=\"border-top mt-4 pt-4\">
                                    <div class=\"d-flex justify-content-between\">
                                        <h6 class=\"m-0\"><i class=\"fa fa-calendar text-primary mr-2\"></i>{{ camping.dateDeb|date('d M Y') }} - {{ camping.dateFin|date('d M Y') }}</h6>
                                        <h5 class=\"m-0\"><a href=\"{{ path('app_camping_show', {'id': camping.id}) }}\" class=\"btn btn-primary btn-sm\">View Details</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {% else %}
                    <div class=\"col-12 text-center\">
                        <p>No camping spots found matching your criteria.</p>
                        {% if is_granted('IS_AUTHENTICATED_FULLY') %}
                            <p>Why not <a href=\"{{ path('app_camping_new') }}\">add a new camping spot</a>?</p>
                        {% endif %}
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <!-- Camping List End -->
{% endblock %}
", "front/camping/index.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/front/camping/index.html.twig");
    }
}
