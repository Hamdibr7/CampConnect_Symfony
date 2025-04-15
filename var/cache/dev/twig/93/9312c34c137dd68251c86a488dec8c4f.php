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

/* admin/avis/index.html.twig */
class __TwigTemplate_0c4e94afb2b7b9eb9c20b78fa8d77bf3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/avis/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/avis/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/avis/index.html.twig", 1);
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

        yield "Admin - Reviews Management";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Reviews Management</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Reviews Management</p>
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
                            <h2 class=\"mb-0\">
                                ";
        // line 31
        if (array_key_exists("camping", $context)) {
            // line 32
            yield "                                    Reviews for ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 32, $this->source); })()), "nom", [], "any", false, false, false, 32), "html", null, true);
            yield "
                                ";
        } else {
            // line 34
            yield "                                    All Reviews
                                ";
        }
        // line 36
        yield "                            </h2>
                            ";
        // line 37
        if (array_key_exists("camping", $context)) {
            // line 38
            yield "                                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_new", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 38, $this->source); })()), "id", [], "any", false, false, false, 38)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">Add New Review</a>
                            ";
        }
        // line 40
        yield "                        </div>
                        
                        <!-- Reviews Table -->
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th>ID</th>
                                        <th>Camping</th>
                                        <th>User</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 56, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["avi"]) {
            // line 57
            yield "                                        <tr>
                                            <td>";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 58), "html", null, true);
            yield "</td>
                                            <td>
                                                <a href=\"";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "camping", [], "any", false, false, false, 60), "id", [], "any", false, false, false, 60)]), "html", null, true);
            yield "\">
                                                    ";
            // line 61
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "camping", [], "any", false, false, false, 61), "nom", [], "any", false, false, false, 61), "html", null, true);
            yield "
                                                </a>
                                            </td>
                                            <td>";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 64), "email", [], "any", false, false, false, 64), "html", null, true);
            yield "</td>
                                            <td>
                                                <div class=\"d-flex\">
                                                    ";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 68
                yield "                                                        ";
                if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "stars", [], "any", false, false, false, 68))) {
                    // line 69
                    yield "                                                            <i class=\"fa fa-star text-primary mr-1\"></i>
                                                        ";
                } else {
                    // line 71
                    yield "                                                            <i class=\"fa fa-star text-secondary mr-1\"></i>
                                                        ";
                }
                // line 73
                yield "                                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            yield "                                                    (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "stars", [], "any", false, false, false, 74), "html", null, true);
            yield "/5)
                                                </div>
                                            </td>
                                            <td>";
            // line 77
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 77)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 77), 0, 50) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 77), "html", null, true)));
            yield "</td>
                                            <td>
                                                <div class=\"btn-group\">
                                                    <a href=\"";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 80)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"fa fa-eye\"></i>
                                                    </a>
                                                    <a href=\"";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 83)]), "html", null, true);
            yield "\" class=\"btn btn-sm btn-primary\">
                                                        <i class=\"fa fa-edit\"></i>
                                                    </a>
                                                    <form method=\"post\" action=\"";
            // line 86
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 86)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\" style=\"display: inline-block;\">
                                                        <input type=\"hidden\" name=\"_token\" value=\"";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 87))), "html", null, true);
            yield "\">
                                                        <button class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    ";
            $context['_iterated'] = true;
        }
        // line 93
        if (!$context['_iterated']) {
            // line 94
            yield "                                        <tr>
                                            <td colspan=\"6\" class=\"text-center\">No reviews found</td>
                                        </tr>
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['avi'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        yield "                                </tbody>
                            </table>
                        </div>
                        
                        <div class=\"mt-3\">
                            ";
        // line 103
        if (array_key_exists("camping", $context)) {
            // line 104
            yield "                                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 104, $this->source); })()), "id", [], "any", false, false, false, 104)]), "html", null, true);
            yield "\" class=\"btn btn-secondary\">
                                    <i class=\"fa fa-arrow-left\"></i> Back to Camping Details
                                </a>
                            ";
        } else {
            // line 108
            yield "                                <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_index");
            yield "\" class=\"btn btn-secondary\">
                                    <i class=\"fa fa-arrow-left\"></i> Back to Camping List
                                </a>
                            ";
        }
        // line 112
        yield "                        </div>
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
        return "admin/avis/index.html.twig";
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
        return array (  297 => 112,  289 => 108,  281 => 104,  279 => 103,  272 => 98,  263 => 94,  261 => 93,  250 => 87,  246 => 86,  240 => 83,  234 => 80,  228 => 77,  221 => 74,  215 => 73,  211 => 71,  207 => 69,  204 => 68,  200 => 67,  194 => 64,  188 => 61,  184 => 60,  179 => 58,  176 => 57,  171 => 56,  153 => 40,  147 => 38,  145 => 37,  142 => 36,  138 => 34,  132 => 32,  130 => 31,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - Reviews Management{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Reviews Management</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Reviews Management</p>
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
                            <h2 class=\"mb-0\">
                                {% if camping is defined %}
                                    Reviews for {{ camping.nom }}
                                {% else %}
                                    All Reviews
                                {% endif %}
                            </h2>
                            {% if camping is defined %}
                                <a href=\"{{ path('app_admin_avis_new', {'id': camping.id}) }}\" class=\"btn btn-primary\">Add New Review</a>
                            {% endif %}
                        </div>
                        
                        <!-- Reviews Table -->
                        <div class=\"table-responsive\">
                            <table class=\"table table-bordered table-hover\">
                                <thead class=\"thead-dark\">
                                    <tr>
                                        <th>ID</th>
                                        <th>Camping</th>
                                        <th>User</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {% for avi in avis %}
                                        <tr>
                                            <td>{{ avi.id }}</td>
                                            <td>
                                                <a href=\"{{ path('app_admin_camping_show', {'id': avi.camping.id}) }}\">
                                                    {{ avi.camping.nom }}
                                                </a>
                                            </td>
                                            <td>{{ avi.utilisateur.email }}</td>
                                            <td>
                                                <div class=\"d-flex\">
                                                    {% for i in 1..5 %}
                                                        {% if i <= avi.stars %}
                                                            <i class=\"fa fa-star text-primary mr-1\"></i>
                                                        {% else %}
                                                            <i class=\"fa fa-star text-secondary mr-1\"></i>
                                                        {% endif %}
                                                    {% endfor %}
                                                    ({{ avi.stars }}/5)
                                                </div>
                                            </td>
                                            <td>{{ avi.commentaire|length > 50 ? avi.commentaire|slice(0, 50) ~ '...' : avi.commentaire }}</td>
                                            <td>
                                                <div class=\"btn-group\">
                                                    <a href=\"{{ path('app_admin_avis_show', {'id': avi.id}) }}\" class=\"btn btn-sm btn-info\">
                                                        <i class=\"fa fa-eye\"></i>
                                                    </a>
                                                    <a href=\"{{ path('app_admin_avis_edit', {'id': avi.id}) }}\" class=\"btn btn-sm btn-primary\">
                                                        <i class=\"fa fa-edit\"></i>
                                                    </a>
                                                    <form method=\"post\" action=\"{{ path('app_admin_avis_delete', {'id': avi.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\" style=\"display: inline-block;\">
                                                        <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ avi.id) }}\">
                                                        <button class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    {% else %}
                                        <tr>
                                            <td colspan=\"6\" class=\"text-center\">No reviews found</td>
                                        </tr>
                                    {% endfor %}
                                </tbody>
                            </table>
                        </div>
                        
                        <div class=\"mt-3\">
                            {% if camping is defined %}
                                <a href=\"{{ path('app_admin_camping_show', {'id': camping.id}) }}\" class=\"btn btn-secondary\">
                                    <i class=\"fa fa-arrow-left\"></i> Back to Camping Details
                                </a>
                            {% else %}
                                <a href=\"{{ path('app_admin_camping_index') }}\" class=\"btn btn-secondary\">
                                    <i class=\"fa fa-arrow-left\"></i> Back to Camping List
                                </a>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->
{% endblock %}
", "admin/avis/index.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/admin/avis/index.html.twig");
    }
}
