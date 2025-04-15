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

/* admin/avis/show.html.twig */
class __TwigTemplate_9af4b5becbbd022b6ca4fcf2253a7988 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/avis/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/avis/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/avis/show.html.twig", 1);
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

        yield "Admin - View Review";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Review Details</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_index");
        yield "\">Reviews Management</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Review #";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 18, $this->source); })()), "id", [], "any", false, false, false, 18), "html", null, true);
        yield "</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Admin Content Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8 mx-auto\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <h2 class=\"mb-0\">Review Details</h2>
                            <div>
                                <a href=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
                                    <i class=\"fa fa-edit\"></i> Edit
                                </a>
                                <form method=\"post\" action=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 37, $this->source); })()), "id", [], "any", false, false, false, 37)]), "html", null, true);
        yield "\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\" style=\"display: inline-block;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 38, $this->source); })()), "id", [], "any", false, false, false, 38))), "html", null, true);
        yield "\">
                                    <button class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class=\"review-details\">
                            <div class=\"row mb-4\">
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-campground text-primary mr-2\"></i> Camping</h5>
                                    <p>
                                        <a href=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 49, $this->source); })()), "camping", [], "any", false, false, false, 49), "id", [], "any", false, false, false, 49)]), "html", null, true);
        yield "\">
                                            ";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 50, $this->source); })()), "camping", [], "any", false, false, false, 50), "nom", [], "any", false, false, false, 50), "html", null, true);
        yield "
                                        </a>
                                    </p>
                                </div>
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-user text-primary mr-2\"></i> User</h5>
                                    <p>";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 56, $this->source); })()), "utilisateur", [], "any", false, false, false, 56), "prenom", [], "any", false, false, false, 56), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 56, $this->source); })()), "utilisateur", [], "any", false, false, false, 56), "nom", [], "any", false, false, false, 56), "html", null, true);
        yield " (";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 56, $this->source); })()), "utilisateur", [], "any", false, false, false, 56), "email", [], "any", false, false, false, 56), "html", null, true);
        yield ")</p>
                                </div>
                            </div>
                            
                            <div class=\"mb-4\">
                                <h5><i class=\"fa fa-star text-primary mr-2\"></i> Rating</h5>
                                <div class=\"d-flex align-items-center\">
                                    <div class=\"mr-3\">
                                        <span class=\"h4\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 64, $this->source); })()), "stars", [], "any", false, false, false, 64), "html", null, true);
        yield "</span>/5
                                    </div>
                                    <div>
                                        ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 68
            yield "                                            ";
            if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 68, $this->source); })()), "stars", [], "any", false, false, false, 68))) {
                // line 69
                yield "                                                <i class=\"fa fa-star text-primary\"></i>
                                            ";
            } else {
                // line 71
                yield "                                                <i class=\"fa fa-star text-secondary\"></i>
                                            ";
            }
            // line 73
            yield "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        yield "                                    </div>
                                </div>
                            </div>
                            
                            <div class=\"mb-4\">
                                <h5><i class=\"fa fa-comment text-primary mr-2\"></i> Comment</h5>
                                ";
        // line 80
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 80, $this->source); })()), "commentaire", [], "any", false, false, false, 80)) {
            // line 81
            yield "                                    <p>";
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 81, $this->source); })()), "commentaire", [], "any", false, false, false, 81), "html", null, true));
            yield "</p>
                                ";
        } else {
            // line 83
            yield "                                    <p class=\"text-muted\">No comment provided</p>
                                ";
        }
        // line 85
        yield "                            </div>
                            
                            <div class=\"mt-5\">
                                <div class=\"d-flex justify-content-between\">
                                    <a href=\"";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_by_camping", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 89, $this->source); })()), "camping", [], "any", false, false, false, 89), "id", [], "any", false, false, false, 89)]), "html", null, true);
        yield "\" class=\"btn btn-secondary\">
                                        <i class=\"fa fa-arrow-left\"></i> Back to Camping Reviews
                                    </a>
                                    <a href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_index");
        yield "\" class=\"btn btn-secondary\">
                                        <i class=\"fa fa-list\"></i> All Reviews
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->
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
        return "admin/avis/show.html.twig";
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
        return array (  250 => 92,  244 => 89,  238 => 85,  234 => 83,  228 => 81,  226 => 80,  218 => 74,  212 => 73,  208 => 71,  204 => 69,  201 => 68,  197 => 67,  191 => 64,  176 => 56,  167 => 50,  163 => 49,  149 => 38,  145 => 37,  139 => 34,  120 => 18,  115 => 16,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - View Review{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Review Details</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_admin_avis_index') }}\">Reviews Management</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Review #{{ avis.id }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Admin Content Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8 mx-auto\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <h2 class=\"mb-0\">Review Details</h2>
                            <div>
                                <a href=\"{{ path('app_admin_avis_edit', {'id': avis.id}) }}\" class=\"btn btn-primary\">
                                    <i class=\"fa fa-edit\"></i> Edit
                                </a>
                                <form method=\"post\" action=\"{{ path('app_admin_avis_delete', {'id': avis.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\" style=\"display: inline-block;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ avis.id) }}\">
                                    <button class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class=\"review-details\">
                            <div class=\"row mb-4\">
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-campground text-primary mr-2\"></i> Camping</h5>
                                    <p>
                                        <a href=\"{{ path('app_admin_camping_show', {'id': avis.camping.id}) }}\">
                                            {{ avis.camping.nom }}
                                        </a>
                                    </p>
                                </div>
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-user text-primary mr-2\"></i> User</h5>
                                    <p>{{ avis.utilisateur.prenom }} {{ avis.utilisateur.nom }} ({{ avis.utilisateur.email }})</p>
                                </div>
                            </div>
                            
                            <div class=\"mb-4\">
                                <h5><i class=\"fa fa-star text-primary mr-2\"></i> Rating</h5>
                                <div class=\"d-flex align-items-center\">
                                    <div class=\"mr-3\">
                                        <span class=\"h4\">{{ avis.stars }}</span>/5
                                    </div>
                                    <div>
                                        {% for i in 1..5 %}
                                            {% if i <= avis.stars %}
                                                <i class=\"fa fa-star text-primary\"></i>
                                            {% else %}
                                                <i class=\"fa fa-star text-secondary\"></i>
                                            {% endif %}
                                        {% endfor %}
                                    </div>
                                </div>
                            </div>
                            
                            <div class=\"mb-4\">
                                <h5><i class=\"fa fa-comment text-primary mr-2\"></i> Comment</h5>
                                {% if avis.commentaire %}
                                    <p>{{ avis.commentaire|nl2br }}</p>
                                {% else %}
                                    <p class=\"text-muted\">No comment provided</p>
                                {% endif %}
                            </div>
                            
                            <div class=\"mt-5\">
                                <div class=\"d-flex justify-content-between\">
                                    <a href=\"{{ path('app_admin_avis_by_camping', {'id': avis.camping.id}) }}\" class=\"btn btn-secondary\">
                                        <i class=\"fa fa-arrow-left\"></i> Back to Camping Reviews
                                    </a>
                                    <a href=\"{{ path('app_admin_avis_index') }}\" class=\"btn btn-secondary\">
                                        <i class=\"fa fa-list\"></i> All Reviews
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->
{% endblock %}
", "admin/avis/show.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/admin/avis/show.html.twig");
    }
}
