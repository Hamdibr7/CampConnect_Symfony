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

/* admin/camping/index.html.twig */
class __TwigTemplate_f5aece8a2f28840e892656ef722730b2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/camping/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/camping/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/camping/index.html.twig", 1);
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

        yield "Admin - Camping Management";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Camping Management</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Camping Management</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Admin Content Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <h2 class=\"mb-0\">Camping Spots</h2>
                            <a href=\"";
        // line 31
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_new");
        yield "\" class=\"btn btn-primary\">Add New Camping</a>
                        </div>
                        
                        <!-- Search Form -->
                        <form action=\"";
        // line 35
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_index");
        yield "\" method=\"get\" class=\"mb-4\">
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <input type=\"text\" name=\"keyword\" class=\"form-control\" placeholder=\"Search by name or description\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "request", [], "any", false, false, false, 38), "query", [], "any", false, false, false, 38), "get", ["keyword"], "method", false, false, false, 38), "html", null, true);
        yield "\">
                                </div>
                                <div class=\"col-md-3\">
                                    <input type=\"text\" name=\"pays\" class=\"form-control\" placeholder=\"Country\" value=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 41, $this->source); })()), "request", [], "any", false, false, false, 41), "query", [], "any", false, false, false, 41), "get", ["pays"], "method", false, false, false, 41), "html", null, true);
        yield "\">
                                </div>
                                <div class=\"col-md-3\">
                                    <input type=\"text\" name=\"ville\" class=\"form-control\" placeholder=\"City\" value=\"";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 44, $this->source); })()), "request", [], "any", false, false, false, 44), "query", [], "any", false, false, false, 44), "get", ["ville"], "method", false, false, false, 44), "html", null, true);
        yield "\">
                                </div>
                                <div class=\"col-md-2\">
                                    <button type=\"submit\" class=\"btn btn-primary btn-block\">Search</button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Camping Table -->
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Dates</th>
                                        <th>Owner</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["campings"]) || array_key_exists("campings", $context) ? $context["campings"] : (function () { throw new RuntimeError('Variable "campings" does not exist.', 67, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["camping"]) {
            // line 68
            yield "                                        <tr>
                                            <td>";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 69), "html", null, true);
            yield "</td>
                                            <td>
                                                <img src=\"";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/camping_images/" . CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "image", [], "any", false, false, false, 71))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "nom", [], "any", false, false, false, 71), "html", null, true);
            yield "\" style=\"width: 80px; height: 60px; object-fit: cover;\">
                                            </td>
                                            <td>";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "nom", [], "any", false, false, false, 73), "html", null, true);
            yield "</td>
                                            <td>";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "ville", [], "any", false, false, false, 74), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "pays", [], "any", false, false, false, 74), "html", null, true);
            yield "</td>
                                            <td>";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateDeb", [], "any", false, false, false, 75), "d/m/Y"), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateFin", [], "any", false, false, false, 75), "d/m/Y"), "html", null, true);
            yield "</td>
                                            <td>";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "utilisateur", [], "any", false, false, false, 76), "email", [], "any", false, false, false, 76), "html", null, true);
            yield "</td>
                                            <td>
                                                <div class=\"btn-group\">
                                                    <a href=\"";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 79)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"fa fa-eye\"></i>
                                                    </a>
                                                    <a href=\"";
            // line 82
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 82)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-primary\">
                                                        <i class=\"fa fa-edit\"></i>
                                                    </a>
                                                    <form method=\"post\" action=\"";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 85)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Are you sure you want to delete this camping?');\" style=\"display: inline-block;\">
                                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 86))), "html", null, true);
            yield "\">
                                                        <button class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
            $context['_iterated'] = true;
        }
        // line 92
        if (!$context['_iterated']) {
            // line 93
            yield "                                        <tr>
                                            <td colspan=\"7\" class=\"text-center\">No camping spots found</td>
                                        </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['camping'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        yield "                                </tbody>
                            </table>
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
        return "admin/camping/index.html.twig";
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
        return array (  261 => 97,  252 => 93,  250 => 92,  239 => 86,  235 => 85,  229 => 82,  223 => 79,  217 => 76,  211 => 75,  205 => 74,  201 => 73,  194 => 71,  189 => 69,  186 => 68,  181 => 67,  155 => 44,  149 => 41,  143 => 38,  137 => 35,  130 => 31,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - Camping Management{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Camping Management</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Camping Management</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Admin Content Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <h2 class=\"mb-0\">Camping Spots</h2>
                            <a href=\"{{ path('app_admin_camping_new') }}\" class=\"btn btn-primary\">Add New Camping</a>
                        </div>
                        
                        <!-- Search Form -->
                        <form action=\"{{ path('app_admin_camping_index') }}\" method=\"get\" class=\"mb-4\">
                            <div class=\"row\">
                                <div class=\"col-md-4\">
                                    <input type=\"text\" name=\"keyword\" class=\"form-control\" placeholder=\"Search by name or description\" value=\"{{ app.request.query.get('keyword') }}\">
                                </div>
                                <div class=\"col-md-3\">
                                    <input type=\"text\" name=\"pays\" class=\"form-control\" placeholder=\"Country\" value=\"{{ app.request.query.get('pays') }}\">
                                </div>
                                <div class=\"col-md-3\">
                                    <input type=\"text\" name=\"ville\" class=\"form-control\" placeholder=\"City\" value=\"{{ app.request.query.get('ville') }}\">
                                </div>
                                <div class=\"col-md-2\">
                                    <button type=\"submit\" class=\"btn btn-primary btn-block\">Search</button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Camping Table -->
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Dates</th>
                                        <th>Owner</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for camping in campings %}
                                        <tr>
                                            <td>{{ camping.id }}</td>
                                            <td>
                                                <img src=\"{{ asset('uploads/camping_images/' ~ camping.image) }}\" alt=\"{{ camping.nom }}\" style=\"width: 80px; height: 60px; object-fit: cover;\">
                                            </td>
                                            <td>{{ camping.nom }}</td>
                                            <td>{{ camping.ville }}, {{ camping.pays }}</td>
                                            <td>{{ camping.dateDeb|date('d/m/Y') }} - {{ camping.dateFin|date('d/m/Y') }}</td>
                                            <td>{{ camping.utilisateur.email }}</td>
                                            <td>
                                                <div class=\"btn-group\">
                                                    <a href=\"{{ path('app_admin_camping_show', {'id': camping.id}) }}\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"fa fa-eye\"></i>
                                                    </a>
                                                    <a href=\"{{ path('app_admin_camping_edit', {'id': camping.id}) }}\" class=\"btn btn-sm btn-primary\">
                                                        <i class=\"fa fa-edit\"></i>
                                                    </a>
                                                    <form method=\"post\" action=\"{{ path('app_admin_camping_delete', {'id': camping.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this camping?');\" style=\"display: inline-block;\">
                                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ camping.id) }}\">
                                                        <button class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    {% else %}
                                        <tr>
                                            <td colspan=\"7\" class=\"text-center\">No camping spots found</td>
                                        </tr>
                                    {% endfor %}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->
{% endblock %}
", "admin/camping/index.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/admin/camping/index.html.twig");
    }
}
