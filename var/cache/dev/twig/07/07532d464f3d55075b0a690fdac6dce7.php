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

/* admin/camping/show.html.twig */
class __TwigTemplate_76ff7fb1dff27c49977a83ff11a873d5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/camping/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/camping/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "admin/camping/show.html.twig", 1);
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

        yield "Admin - View Camping ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Camping Details</h3>
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
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_index");
        yield "\">Camping Management</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 18, $this->source); })()), "nom", [], "any", false, false, false, 18), "html", null, true);
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
                <div class=\"col-lg-8\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <h2 class=\"mb-0\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 32, $this->source); })()), "nom", [], "any", false, false, false, 32), "html", null, true);
        yield "</h2>
                            <div>
                                <a href=\"";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 34, $this->source); })()), "id", [], "any", false, false, false, 34)]), "html", null, true);
        yield "\" class=\"btn btn-primary\">
                                    <i class=\"fa fa-edit\"></i> Edit
                                </a>
                                <form method=\"post\" action=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 37, $this->source); })()), "id", [], "any", false, false, false, 37)]), "html", null, true);
        yield "\" onsubmit=\"return confirm('Are you sure you want to delete this camping?');\" style=\"display: inline-block;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 38, $this->source); })()), "id", [], "any", false, false, false, 38))), "html", null, true);
        yield "\">
                                    <button class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class=\"camping-details\">
                            <img src=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/camping_images/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 45, $this->source); })()), "image", [], "any", false, false, false, 45))), "html", null, true);
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 45, $this->source); })()), "nom", [], "any", false, false, false, 45), "html", null, true);
        yield "\" class=\"img-fluid mb-4\" style=\"max-height: 400px; width: 100%; object-fit: cover;\">
                            
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i> Location</h5>
                                    <p>";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 50, $this->source); })()), "ville", [], "any", false, false, false, 50), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 50, $this->source); })()), "pays", [], "any", false, false, false, 50), "html", null, true);
        yield "</p>
                                </div>
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-calendar-alt text-primary mr-2\"></i> Dates</h5>
                                    <p>";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 54, $this->source); })()), "dateDeb", [], "any", false, false, false, 54), "d/m/Y"), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 54, $this->source); })()), "dateFin", [], "any", false, false, false, 54), "d/m/Y"), "html", null, true);
        yield "</p>
                                </div>
                            </div>
                            
                            <div class=\"mb-3\">
                                <h5><i class=\"fa fa-home text-primary mr-2\"></i> Address</h5>
                                <p>";
        // line 60
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 60, $this->source); })()), "adresse", [], "any", false, false, false, 60), "html", null, true));
        yield "</p>
                            </div>
                            
                            <div class=\"mb-3\">
                                <h5><i class=\"fa fa-info-circle text-primary mr-2\"></i> Description</h5>
                                <p>";
        // line 65
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 65, $this->source); })()), "description", [], "any", false, false, false, 65), "html", null, true));
        yield "</p>
                            </div>
                            
                            <div class=\"mb-3\">
                                <h5><i class=\"fa fa-user text-primary mr-2\"></i> Owner</h5>
                                <p>
                                    <strong>Name:</strong> ";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 71, $this->source); })()), "utilisateur", [], "any", false, false, false, 71), "prenom", [], "any", false, false, false, 71), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 71, $this->source); })()), "utilisateur", [], "any", false, false, false, 71), "nom", [], "any", false, false, false, 71), "html", null, true);
        yield "<br>
                                    <strong>Email:</strong> ";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 72, $this->source); })()), "utilisateur", [], "any", false, false, false, 72), "email", [], "any", false, false, false, 72), "html", null, true);
        yield "<br>
                                    ";
        // line 73
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 73, $this->source); })()), "utilisateur", [], "any", false, false, false, 73), "age", [], "any", false, false, false, 73)) {
            // line 74
            yield "                                        <strong>Age:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 74, $this->source); })()), "utilisateur", [], "any", false, false, false, 74), "age", [], "any", false, false, false, 74), "html", null, true);
            yield " years<br>
                                    ";
        }
        // line 76
        yield "                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=\"col-lg-4\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <h3 class=\"mb-4\">Reviews (";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 84, $this->source); })())), "html", null, true);
        yield ")</h3>
                        <div class=\"mb-3\">
                            <h5>Average Rating</h5>
                            <div class=\"d-flex align-items-center\">
                                <div class=\"mr-2\">
                                    ";
        // line 89
        if ((isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 89, $this->source); })())) {
            // line 90
            yield "                                        <span class=\"h4\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 90, $this->source); })()), 1), "html", null, true);
            yield "</span>/5
                                    ";
        } else {
            // line 92
            yield "                                        <span class=\"text-muted\">No ratings yet</span>
                                    ";
        }
        // line 94
        yield "                                </div>
                                ";
        // line 95
        if ((isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 95, $this->source); })())) {
            // line 96
            yield "                                    <div>
                                        ";
            // line 97
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 98
                yield "                                            ";
                if (($context["i"] <= (isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 98, $this->source); })()))) {
                    // line 99
                    yield "                                                <i class=\"fa fa-star text-primary\"></i>
                                            ";
                } elseif ((                // line 100
$context["i"] <= ((isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 100, $this->source); })()) + 0.5))) {
                    // line 101
                    yield "                                                <i class=\"fa fa-star-half-alt text-primary\"></i>
                                            ";
                } else {
                    // line 103
                    yield "                                                <i class=\"fa fa-star text-secondary\"></i>
                                            ";
                }
                // line 105
                yield "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 106
            yield "                                    </div>
                                ";
        }
        // line 108
        yield "                            </div>
                        </div>
                        
                        <a href=\"";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_by_camping", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 111, $this->source); })()), "id", [], "any", false, false, false, 111)]), "html", null, true);
        yield "\" class=\"btn btn-primary btn-block mb-3\">Manage Reviews</a>
                        <a href=\"";
        // line 112
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_new", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 112, $this->source); })()), "id", [], "any", false, false, false, 112)]), "html", null, true);
        yield "\" class=\"btn btn-outline-primary btn-block mb-3\">Add Review</a>
                        
                        <hr>
                        
                        <h5 class=\"mb-3\">Recent Reviews</h5>
                        ";
        // line 117
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 117, $this->source); })()))) {
            // line 118
            yield "                            <p class=\"text-muted\">No reviews yet</p>
                        ";
        } else {
            // line 120
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 120, $this->source); })()), 0, 3));
            foreach ($context['_seq'] as $context["_key"] => $context["avi"]) {
                // line 121
                yield "                                <div class=\"border-bottom mb-3 pb-3\">
                                    <div class=\"d-flex justify-content-between mb-2\">
                                        <div>
                                            <h6>";
                // line 124
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 124), "prenom", [], "any", false, false, false, 124), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 124), "nom", [], "any", false, false, false, 124), "html", null, true);
                yield "</h6>
                                            <div class=\"d-flex\">
                                                ";
                // line 126
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 127
                    yield "                                                    ";
                    if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "stars", [], "any", false, false, false, 127))) {
                        // line 128
                        yield "                                                        <i class=\"fa fa-star text-primary mr-1\"></i>
                                                    ";
                    } else {
                        // line 130
                        yield "                                                        <i class=\"fa fa-star text-secondary mr-1\"></i>
                                                    ";
                    }
                    // line 132
                    yield "                                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 133
                yield "                                            </div>
                                        </div>
                                    </div>
                                    ";
                // line 136
                if (CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 136)) {
                    // line 137
                    yield "                                        <p class=\"m-0\">";
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 137)) > 100)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 137), 0, 100) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 137), "html", null, true)));
                    yield "</p>
                                    ";
                }
                // line 139
                yield "                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['avi'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 141
            yield "                            
                            ";
            // line 142
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 142, $this->source); })())) > 3)) {
                // line 143
                yield "                                <div class=\"text-center\">
                                    <a href=\"";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_by_camping", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 144, $this->source); })()), "id", [], "any", false, false, false, 144)]), "html", null, true);
                yield "\" class=\"btn btn-link\">View all ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 144, $this->source); })())), "html", null, true);
                yield " reviews</a>
                                </div>
                            ";
            }
            // line 147
            yield "                        ";
        }
        // line 148
        yield "                    </div>
                    
                    <div class=\"bg-white p-4 shadow\">
                        <h3 class=\"mb-4\">Actions</h3>
                        <div class=\"list-group\">
                            <a href=\"";
        // line 153
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_index");
        yield "\" class=\"list-group-item list-group-item-action\">
                                <i class=\"fa fa-arrow-left mr-2\"></i> Back to Camping List
                            </a>
                            <a href=\"";
        // line 156
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 156, $this->source); })()), "id", [], "any", false, false, false, 156)]), "html", null, true);
        yield "\" class=\"list-group-item list-group-item-action\" target=\"_blank\">
                                <i class=\"fa fa-eye mr-2\"></i> View on Front Office
                            </a>
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
        return "admin/camping/show.html.twig";
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
        return array (  409 => 156,  403 => 153,  396 => 148,  393 => 147,  385 => 144,  382 => 143,  380 => 142,  377 => 141,  370 => 139,  364 => 137,  362 => 136,  357 => 133,  351 => 132,  347 => 130,  343 => 128,  340 => 127,  336 => 126,  329 => 124,  324 => 121,  319 => 120,  315 => 118,  313 => 117,  305 => 112,  301 => 111,  296 => 108,  292 => 106,  286 => 105,  282 => 103,  278 => 101,  276 => 100,  273 => 99,  270 => 98,  266 => 97,  263 => 96,  261 => 95,  258 => 94,  254 => 92,  248 => 90,  246 => 89,  238 => 84,  228 => 76,  222 => 74,  220 => 73,  216 => 72,  210 => 71,  201 => 65,  193 => 60,  182 => 54,  173 => 50,  163 => 45,  153 => 38,  149 => 37,  143 => 34,  138 => 32,  121 => 18,  116 => 16,  109 => 12,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Admin - View Camping {{ camping.nom }}{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Camping Details</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Admin</p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_admin_camping_index') }}\">Camping Management</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">{{ camping.nom }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Admin Content Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <h2 class=\"mb-0\">{{ camping.nom }}</h2>
                            <div>
                                <a href=\"{{ path('app_admin_camping_edit', {'id': camping.id}) }}\" class=\"btn btn-primary\">
                                    <i class=\"fa fa-edit\"></i> Edit
                                </a>
                                <form method=\"post\" action=\"{{ path('app_admin_camping_delete', {'id': camping.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this camping?');\" style=\"display: inline-block;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ camping.id) }}\">
                                    <button class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                        
                        <div class=\"camping-details\">
                            <img src=\"{{ asset('uploads/camping_images/' ~ camping.image) }}\" alt=\"{{ camping.nom }}\" class=\"img-fluid mb-4\" style=\"max-height: 400px; width: 100%; object-fit: cover;\">
                            
                            <div class=\"row mb-3\">
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i> Location</h5>
                                    <p>{{ camping.ville }}, {{ camping.pays }}</p>
                                </div>
                                <div class=\"col-md-6\">
                                    <h5><i class=\"fa fa-calendar-alt text-primary mr-2\"></i> Dates</h5>
                                    <p>{{ camping.dateDeb|date('d/m/Y') }} - {{ camping.dateFin|date('d/m/Y') }}</p>
                                </div>
                            </div>
                            
                            <div class=\"mb-3\">
                                <h5><i class=\"fa fa-home text-primary mr-2\"></i> Address</h5>
                                <p>{{ camping.adresse|nl2br }}</p>
                            </div>
                            
                            <div class=\"mb-3\">
                                <h5><i class=\"fa fa-info-circle text-primary mr-2\"></i> Description</h5>
                                <p>{{ camping.description|nl2br }}</p>
                            </div>
                            
                            <div class=\"mb-3\">
                                <h5><i class=\"fa fa-user text-primary mr-2\"></i> Owner</h5>
                                <p>
                                    <strong>Name:</strong> {{ camping.utilisateur.prenom }} {{ camping.utilisateur.nom }}<br>
                                    <strong>Email:</strong> {{ camping.utilisateur.email }}<br>
                                    {% if camping.utilisateur.age %}
                                        <strong>Age:</strong> {{ camping.utilisateur.age }} years<br>
                                    {% endif %}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class=\"col-lg-4\">
                    <div class=\"bg-white p-4 shadow mb-4\">
                        <h3 class=\"mb-4\">Reviews ({{ avis|length }})</h3>
                        <div class=\"mb-3\">
                            <h5>Average Rating</h5>
                            <div class=\"d-flex align-items-center\">
                                <div class=\"mr-2\">
                                    {% if averageRating %}
                                        <span class=\"h4\">{{ averageRating|number_format(1) }}</span>/5
                                    {% else %}
                                        <span class=\"text-muted\">No ratings yet</span>
                                    {% endif %}
                                </div>
                                {% if averageRating %}
                                    <div>
                                        {% for i in 1..5 %}
                                            {% if i <= averageRating %}
                                                <i class=\"fa fa-star text-primary\"></i>
                                            {% elseif i <= averageRating + 0.5 %}
                                                <i class=\"fa fa-star-half-alt text-primary\"></i>
                                            {% else %}
                                                <i class=\"fa fa-star text-secondary\"></i>
                                            {% endif %}
                                        {% endfor %}
                                    </div>
                                {% endif %}
                            </div>
                        </div>
                        
                        <a href=\"{{ path('app_admin_avis_by_camping', {'id': camping.id}) }}\" class=\"btn btn-primary btn-block mb-3\">Manage Reviews</a>
                        <a href=\"{{ path('app_admin_avis_new', {'id': camping.id}) }}\" class=\"btn btn-outline-primary btn-block mb-3\">Add Review</a>
                        
                        <hr>
                        
                        <h5 class=\"mb-3\">Recent Reviews</h5>
                        {% if avis is empty %}
                            <p class=\"text-muted\">No reviews yet</p>
                        {% else %}
                            {% for avi in avis|slice(0, 3) %}
                                <div class=\"border-bottom mb-3 pb-3\">
                                    <div class=\"d-flex justify-content-between mb-2\">
                                        <div>
                                            <h6>{{ avi.utilisateur.prenom }} {{ avi.utilisateur.nom }}</h6>
                                            <div class=\"d-flex\">
                                                {% for i in 1..5 %}
                                                    {% if i <= avi.stars %}
                                                        <i class=\"fa fa-star text-primary mr-1\"></i>
                                                    {% else %}
                                                        <i class=\"fa fa-star text-secondary mr-1\"></i>
                                                    {% endif %}
                                                {% endfor %}
                                            </div>
                                        </div>
                                    </div>
                                    {% if avi.commentaire %}
                                        <p class=\"m-0\">{{ avi.commentaire|length > 100 ? avi.commentaire|slice(0, 100) ~ '...' : avi.commentaire }}</p>
                                    {% endif %}
                                </div>
                            {% endfor %}
                            
                            {% if avis|length > 3 %}
                                <div class=\"text-center\">
                                    <a href=\"{{ path('app_admin_avis_by_camping', {'id': camping.id}) }}\" class=\"btn btn-link\">View all {{ avis|length }} reviews</a>
                                </div>
                            {% endif %}
                        {% endif %}
                    </div>
                    
                    <div class=\"bg-white p-4 shadow\">
                        <h3 class=\"mb-4\">Actions</h3>
                        <div class=\"list-group\">
                            <a href=\"{{ path('app_admin_camping_index') }}\" class=\"list-group-item list-group-item-action\">
                                <i class=\"fa fa-arrow-left mr-2\"></i> Back to Camping List
                            </a>
                            <a href=\"{{ path('app_camping_show', {'id': camping.id}) }}\" class=\"list-group-item list-group-item-action\" target=\"_blank\">
                                <i class=\"fa fa-eye mr-2\"></i> View on Front Office
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Admin Content End -->
{% endblock %}
", "admin/camping/show.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/admin/camping/show.html.twig");
    }
}
