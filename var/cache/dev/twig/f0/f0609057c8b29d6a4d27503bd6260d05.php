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

/* admin/avis/edit.html.twig */
class __TwigTemplate_7a70d97d72bf0a410a326648318258e2 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/avis/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/avis/edit.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/avis/edit.html.twig", 1);
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

        yield "Admin - Edit Review";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Edit Review</h3>
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
                    <p class=\"m-0 text-uppercase\">Edit Review #";
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
                    <div class=\"bg-white p-5 shadow\">
                        <h2 class=\"mb-4\">Edit Review</h2>
                        
                        <div class=\"mb-4\">
                            <h5>Camping: <a href=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 34, $this->source); })()), "camping", [], "any", false, false, false, 34), "id", [], "any", false, false, false, 34)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 34, $this->source); })()), "camping", [], "any", false, false, false, 34), "nom", [], "any", false, false, false, 34), "html", null, true);
        yield "</a></h5>
                        </div>
                        
                        ";
        // line 37
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), 'form_start', ["attr" => ["class" => "avis-form"]]);
        yield "
                            <div class=\"form-group\">
                                ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "utilisateur", [], "any", false, false, false, 39), 'label');
        yield "
                                ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "utilisateur", [], "any", false, false, false, 40), 'widget');
        yield "
                                ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "utilisateur", [], "any", false, false, false, 41), 'errors');
        yield "
                            </div>
                            
                            <div class=\"form-group\">
                                ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "stars", [], "any", false, false, false, 45), 'label');
        yield "
                                <div class=\"stars-container\">
                                    ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "stars", [], "any", false, false, false, 47), 'widget');
        yield "
                                </div>
                                ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 49, $this->source); })()), "stars", [], "any", false, false, false, 49), 'errors');
        yield "
                            </div>
                            
                            <div class=\"form-group\">
                                ";
        // line 53
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), "commentaire", [], "any", false, false, false, 53), 'label');
        yield "
                                ";
        // line 54
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "commentaire", [], "any", false, false, false, 54), 'widget');
        yield "
                                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "commentaire", [], "any", false, false, false, 55), 'errors');
        yield "
                            </div>
                            
                            <div class=\"form-group mt-4\">
                                <button class=\"btn btn-primary btn-block py-3\">Update Review</button>
                            </div>
                            
                            <div class=\"mt-3 d-flex justify-content-between\">
                                <a href=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_by_camping", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 63, $this->source); })()), "camping", [], "any", false, false, false, 63), "id", [], "any", false, false, false, 63)]), "html", null, true);
        yield "\">Back to camping reviews</a>
                                
                                <form method=\"post\" action=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 65, $this->source); })()), "id", [], "any", false, false, false, 65)]), "html", null, true);
        yield "\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 66, $this->source); })()), "id", [], "any", false, false, false, 66))), "html", null, true);
        yield "\">
                                    <button class=\"btn btn-outline-danger\">Delete</button>
                                </form>
                            </div>
                        ";
        // line 70
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), 'form_end');
        yield "
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

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 80
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <style>
        .stars-container {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }
        
        .stars-rating label {
            margin-right: 15px;
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        .stars-rating input[type=\"radio\"] {
            margin-right: 5px;
        }
    </style>
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
        return "admin/avis/edit.html.twig";
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
        return array (  252 => 80,  239 => 79,  220 => 70,  213 => 66,  209 => 65,  204 => 63,  193 => 55,  189 => 54,  185 => 53,  178 => 49,  173 => 47,  168 => 45,  161 => 41,  157 => 40,  153 => 39,  148 => 37,  140 => 34,  121 => 18,  116 => 16,  109 => 12,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - Edit Review{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Edit Review</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_admin_avis_index') }}\">Reviews Management</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Edit Review #{{ avis.id }}</p>
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
                    <div class=\"bg-white p-5 shadow\">
                        <h2 class=\"mb-4\">Edit Review</h2>
                        
                        <div class=\"mb-4\">
                            <h5>Camping: <a href=\"{{ path('app_admin_camping_show', {'id': avis.camping.id}) }}\">{{ avis.camping.nom }}</a></h5>
                        </div>
                        
                        {{ form_start(form, {'attr': {'class': 'avis-form'}}) }}
                            <div class=\"form-group\">
                                {{ form_label(form.utilisateur) }}
                                {{ form_widget(form.utilisateur) }}
                                {{ form_errors(form.utilisateur) }}
                            </div>
                            
                            <div class=\"form-group\">
                                {{ form_label(form.stars) }}
                                <div class=\"stars-container\">
                                    {{ form_widget(form.stars) }}
                                </div>
                                {{ form_errors(form.stars) }}
                            </div>
                            
                            <div class=\"form-group\">
                                {{ form_label(form.commentaire) }}
                                {{ form_widget(form.commentaire) }}
                                {{ form_errors(form.commentaire) }}
                            </div>
                            
                            <div class=\"form-group mt-4\">
                                <button class=\"btn btn-primary btn-block py-3\">Update Review</button>
                            </div>
                            
                            <div class=\"mt-3 d-flex justify-content-between\">
                                <a href=\"{{ path('app_admin_avis_by_camping', {'id': avis.camping.id}) }}\">Back to camping reviews</a>
                                
                                <form method=\"post\" action=\"{{ path('app_admin_avis_delete', {'id': avis.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ avis.id) }}\">
                                    <button class=\"btn btn-outline-danger\">Delete</button>
                                </form>
                            </div>
                        {{ form_end(form) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->
{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        .stars-container {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }
        
        .stars-rating label {
            margin-right: 15px;
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        .stars-rating input[type=\"radio\"] {
            margin-right: 5px;
        }
    </style>
{% endblock %}
", "admin/avis/edit.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/admin/avis/edit.html.twig");
    }
}
