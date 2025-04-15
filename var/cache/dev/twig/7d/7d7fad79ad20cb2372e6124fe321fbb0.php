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

/* front/camping/show.html.twig */
class __TwigTemplate_e8be0f565b5e7001e09da8f3009aa4f3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/camping/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/camping/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "front/camping/show.html.twig", 1);
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 3, $this->source); })()), "nom", [], "any", false, false, false, 3), "html", null, true);
        yield " - CampConnect";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 10, $this->source); })()), "nom", [], "any", false, false, false, 10), "html", null, true);
        yield "</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_index");
        yield "\">Camping Spots</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 16, $this->source); })()), "nom", [], "any", false, false, false, 16), "html", null, true);
        yield "</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Camping Detail Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pb-3\">
            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <div class=\"mb-4\">
                        <img class=\"img-fluid w-100 mb-4\" src=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/camping_images/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 29, $this->source); })()), "image", [], "any", false, false, false, 29))), "html", null, true);
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 29, $this->source); })()), "nom", [], "any", false, false, false, 29), "html", null, true);
        yield "\">
                        <div class=\"p-4 bg-white\">
                            <div class=\"d-flex justify-content-between mb-3\">
                                <div>
                                    <h6 class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 33, $this->source); })()), "ville", [], "any", false, false, false, 33), "html", null, true);
        yield ", ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 33, $this->source); })()), "pays", [], "any", false, false, false, 33), "html", null, true);
        yield "</h6>
                                </div>
                                <div>
                                    <h6 class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 36, $this->source); })()), "dateDeb", [], "any", false, false, false, 36), "d M Y"), "html", null, true);
        yield " - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 36, $this->source); })()), "dateFin", [], "any", false, false, false, 36), "d M Y"), "html", null, true);
        yield "</h6>
                                </div>
                                <div>
                                    <h6 class=\"m-0\"><i class=\"fa fa-star text-primary mr-2\"></i>";
        // line 39
        yield (((isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 39, $this->source); })())) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($this->extensions['Twig\Extension\CoreExtension']->formatNumber((isset($context["averageRating"]) || array_key_exists("averageRating", $context) ? $context["averageRating"] : (function () { throw new RuntimeError('Variable "averageRating" does not exist.', 39, $this->source); })()), 1) . "/5"), "html", null, true)) : ("No ratings yet"));
        yield "</h6>
                                </div>
                            </div>
                            <h1>";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 42, $this->source); })()), "nom", [], "any", false, false, false, 42), "html", null, true);
        yield "</h1>
                            <div class=\"border-top mt-4 pt-4\">
                                <h4 class=\"mb-3\">Description</h4>
                                <p>";
        // line 45
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 45, $this->source); })()), "description", [], "any", false, false, false, 45), "html", null, true));
        yield "</p>
                            </div>
                            <div class=\"border-top mt-4 pt-4\">
                                <h4 class=\"mb-3\">Address</h4>
                                <p>";
        // line 49
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 49, $this->source); })()), "adresse", [], "any", false, false, false, 49), "html", null, true));
        yield "</p>
                            </div>
                            
                            ";
        // line 52
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "session", [], "any", false, false, false, 52), "get", ["user_id"], "method", false, false, false, 52) && (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 52, $this->source); })()), "utilisateur", [], "any", false, false, false, 52) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "session", [], "any", false, false, false, 52), "get", ["user_id"], "method", false, false, false, 52) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 52, $this->source); })()), "utilisateur", [], "any", false, false, false, 52), "id", [], "any", false, false, false, 52))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "session", [], "any", false, false, false, 52), "get", ["user_id"], "method", false, false, false, 52) == 111)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 52), "get", ["user_roles"], "method", true, true, false, 52) && CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 52, $this->source); })()), "session", [], "any", false, false, false, 52), "get", ["user_roles"], "method", false, false, false, 52)))))) {
            // line 53
            yield "                                <div class=\"border-top mt-4 pt-4\">
                                    <div class=\"d-flex justify-content-between\">
                                        <a href=\"";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 55, $this->source); })()), "id", [], "any", false, false, false, 55)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">Edit</a>
                                        <form method=\"post\" action=\"";
            // line 56
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 56, $this->source); })()), "id", [], "any", false, false, false, 56)]), "html", null, true);
            yield "\" onsubmit=\"return confirm('Are you sure you want to delete this camping spot?');\">
                                            <input type=\"hidden\" name=\"_token\" value=\"";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 57, $this->source); })()), "id", [], "any", false, false, false, 57))), "html", null, true);
            yield "\">
                                            <button class=\"btn btn-danger\">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            ";
        }
        // line 63
        yield "                        </div>
                    </div>
                </div>
                
                <div class=\"col-lg-4\">
                    <div class=\"bg-white mb-4 p-4\">
                        <h3 class=\"mb-4\">Camping Owner</h3>
                        <div class=\"d-flex align-items-center mb-4\">
                            <img class=\"rounded-circle mr-3\" style=\"width: 60px; height: 60px;\" src=\"";
        // line 71
        yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 71, $this->source); })()), "utilisateur", [], "any", false, false, false, 71), "pdp", [], "any", false, false, false, 71)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/profile_images/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 71, $this->source); })()), "utilisateur", [], "any", false, false, false, 71), "pdp", [], "any", false, false, false, 71))), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/user.jpg"), "html", null, true)));
        yield "\" alt=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 71, $this->source); })()), "utilisateur", [], "any", false, false, false, 71), "nom", [], "any", false, false, false, 71), "html", null, true);
        yield "\">
                            <div>
                                <h5>";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 73, $this->source); })()), "utilisateur", [], "any", false, false, false, 73), "prenom", [], "any", false, false, false, 73), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 73, $this->source); })()), "utilisateur", [], "any", false, false, false, 73), "nom", [], "any", false, false, false, 73), "html", null, true);
        yield "</h5>
                                <p class=\"m-0\">";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 74, $this->source); })()), "utilisateur", [], "any", false, false, false, 74), "email", [], "any", false, false, false, 74), "html", null, true);
        yield "</p>
                            </div>
                        </div>
                        ";
        // line 77
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 77, $this->source); })()), "utilisateur", [], "any", false, false, false, 77), "bio", [], "any", false, false, false, 77)) {
            // line 78
            yield "                            <p>";
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 78, $this->source); })()), "utilisateur", [], "any", false, false, false, 78), "bio", [], "any", false, false, false, 78), "html", null, true));
            yield "</p>
                        ";
        }
        // line 80
        yield "                    </div>
                    
                    <div class=\"bg-white mb-4 p-4\">
                        <h3 class=\"mb-4\">Reviews (";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 83, $this->source); })())), "html", null, true);
        yield ")</h3>
                        ";
        // line 84
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "session", [], "any", false, false, false, 84), "get", ["user_id"], "method", false, false, false, 84) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 84, $this->source); })()), "utilisateur", [], "any", false, false, false, 84)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "session", [], "any", false, false, false, 84), "get", ["user_id"], "method", false, false, false, 84) != CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 84, $this->source); })()), "utilisateur", [], "any", false, false, false, 84), "id", [], "any", false, false, false, 84)))) {
            // line 85
            yield "                            <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_avis_new", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 85, $this->source); })()), "id", [], "any", false, false, false, 85)]), "html", null, true);
            yield "\" class=\"btn btn-primary btn-block mb-4\">Write a Review</a>
                        ";
        }
        // line 87
        yield "                        
                        ";
        // line 88
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 88, $this->source); })()))) {
            // line 89
            yield "                            <p>No reviews yet. Be the first to review this camping spot!</p>
                        ";
        } else {
            // line 91
            yield "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 91, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["avi"]) {
                // line 92
                yield "                                <div class=\"border-bottom mb-3 pb-3\">
                                    <div class=\"d-flex justify-content-between mb-2\">
                                        <div>
                                            <h6>";
                // line 95
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 95), "prenom", [], "any", false, false, false, 95), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 95), "nom", [], "any", false, false, false, 95), "html", null, true);
                yield "</h6>
                                            <div class=\"d-flex\">
                                                ";
                // line 97
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 98
                    yield "                                                    ";
                    if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "stars", [], "any", false, false, false, 98))) {
                        // line 99
                        yield "                                                        <i class=\"fa fa-star text-primary mr-1\"></i>
                                                    ";
                    } else {
                        // line 101
                        yield "                                                        <i class=\"fa fa-star text-secondary mr-1\"></i>
                                                    ";
                    }
                    // line 103
                    yield "                                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 104
                yield "                                            </div>
                                        </div>
                                        ";
                // line 106
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 106, $this->source); })()), "session", [], "any", false, false, false, 106), "get", ["user_id"], "method", false, false, false, 106) && (((CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 106) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 106, $this->source); })()), "session", [], "any", false, false, false, 106), "get", ["user_id"], "method", false, false, false, 106) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "utilisateur", [], "any", false, false, false, 106), "id", [], "any", false, false, false, 106))) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 106, $this->source); })()), "session", [], "any", false, false, false, 106), "get", ["user_id"], "method", false, false, false, 106) == 111)) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 106), "get", ["user_roles"], "method", true, true, false, 106) && CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 106, $this->source); })()), "session", [], "any", false, false, false, 106), "get", ["user_roles"], "method", false, false, false, 106)))))) {
                    // line 107
                    yield "                                            <div>
                                                <a href=\"";
                    // line 108
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_avis_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 108)]), "html", null, true);
                    yield "\" class=\"btn btn-sm btn-outline-primary\"><i class=\"fa fa-edit\"></i></a>
                                                <form method=\"post\" action=\"";
                    // line 109
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_avis_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 109)]), "html", null, true);
                    yield "\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\" style=\"display: inline-block;\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"";
                    // line 110
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "id", [], "any", false, false, false, 110))), "html", null, true);
                    yield "\">
                                                    <button class=\"btn btn-sm btn-outline-danger\"><i class=\"fa fa-trash\"></i></button>
                                                </form>
                                            </div>
                                        ";
                }
                // line 115
                yield "                                    </div>
                                    ";
                // line 116
                if (CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 116)) {
                    // line 117
                    yield "                                        <p class=\"m-0\">";
                    yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["avi"], "commentaire", [], "any", false, false, false, 117), "html", null, true));
                    yield "</p>
                                    ";
                }
                // line 119
                yield "                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['avi'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            yield "                        ";
        }
        // line 122
        yield "                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Camping Detail End -->

    <!-- Related Camping Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Related Camping Spots</h6>
                <h1>You May Also Like</h1>
            </div>
            <div class=\"row\">
                ";
        // line 137
        $context["relatedCount"] = 0;
        // line 138
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["campings"]) || array_key_exists("campings", $context) ? $context["campings"] : (function () { throw new RuntimeError('Variable "campings" does not exist.', 138, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["related"]) {
            // line 139
            yield "                    ";
            if (((CoreExtension::getAttribute($this->env, $this->source, $context["related"], "id", [], "any", false, false, false, 139) != CoreExtension::getAttribute($this->env, $this->source, (isset($context["camping"]) || array_key_exists("camping", $context) ? $context["camping"] : (function () { throw new RuntimeError('Variable "camping" does not exist.', 139, $this->source); })()), "id", [], "any", false, false, false, 139)) && ((isset($context["relatedCount"]) || array_key_exists("relatedCount", $context) ? $context["relatedCount"] : (function () { throw new RuntimeError('Variable "relatedCount" does not exist.', 139, $this->source); })()) < 3))) {
                // line 140
                yield "                        ";
                $context["relatedCount"] = ((isset($context["relatedCount"]) || array_key_exists("relatedCount", $context) ? $context["relatedCount"] : (function () { throw new RuntimeError('Variable "relatedCount" does not exist.', 140, $this->source); })()) + 1);
                // line 141
                yield "                        <div class=\"col-lg-4 col-md-6 mb-4\">
                            <div class=\"package-item bg-white mb-2\">
                                <img class=\"img-fluid\" src=\"";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/camping_images/" . CoreExtension::getAttribute($this->env, $this->source, $context["related"], "image", [], "any", false, false, false, 143))), "html", null, true);
                yield "\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "nom", [], "any", false, false, false, 143), "html", null, true);
                yield "\">
                                <div class=\"p-4\">
                                    <div class=\"d-flex justify-content-between mb-3\">
                                        <small class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "ville", [], "any", false, false, false, 146), "html", null, true);
                yield ", ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "pays", [], "any", false, false, false, 146), "html", null, true);
                yield "</small>
                                        <small class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "dateFin", [], "any", false, false, false, 147), "U") - $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "dateDeb", [], "any", false, false, false, 147), "U")) / 86400), "html", null, true);
                yield " days</small>
                                    </div>
                                    <a class=\"h5 text-decoration-none\" href=\"";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["related"], "id", [], "any", false, false, false, 149)]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "nom", [], "any", false, false, false, 149), "html", null, true);
                yield "</a>
                                    <div class=\"border-top mt-4 pt-4\">
                                        <div class=\"d-flex justify-content-between\">
                                            <h6 class=\"m-0\"><i class=\"fa fa-calendar text-primary mr-2\"></i>";
                // line 152
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["related"], "dateDeb", [], "any", false, false, false, 152), "d M Y"), "html", null, true);
                yield "</h6>
                                            <h5 class=\"m-0\"><a href=\"";
                // line 153
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["related"], "id", [], "any", false, false, false, 153)]), "html", null, true);
                yield "\" class=\"btn btn-primary btn-sm\">View Details</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 160
            yield "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['related'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "            </div>
        </div>
    </div>
    <!-- Related Camping End -->
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
        return "front/camping/show.html.twig";
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
        return array (  439 => 161,  433 => 160,  423 => 153,  419 => 152,  411 => 149,  406 => 147,  400 => 146,  392 => 143,  388 => 141,  385 => 140,  382 => 139,  377 => 138,  375 => 137,  358 => 122,  355 => 121,  348 => 119,  342 => 117,  340 => 116,  337 => 115,  329 => 110,  325 => 109,  321 => 108,  318 => 107,  316 => 106,  312 => 104,  306 => 103,  302 => 101,  298 => 99,  295 => 98,  291 => 97,  284 => 95,  279 => 92,  274 => 91,  270 => 89,  268 => 88,  265 => 87,  259 => 85,  257 => 84,  253 => 83,  248 => 80,  242 => 78,  240 => 77,  234 => 74,  228 => 73,  221 => 71,  211 => 63,  202 => 57,  198 => 56,  194 => 55,  190 => 53,  188 => 52,  182 => 49,  175 => 45,  169 => 42,  163 => 39,  155 => 36,  147 => 33,  138 => 29,  122 => 16,  117 => 14,  112 => 12,  107 => 10,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ camping.nom }} - CampConnect{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">{{ camping.nom }}</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_camping_index') }}\">Camping Spots</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">{{ camping.nom }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Camping Detail Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pb-3\">
            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <div class=\"mb-4\">
                        <img class=\"img-fluid w-100 mb-4\" src=\"{{ asset('uploads/camping_images/' ~ camping.image) }}\" alt=\"{{ camping.nom }}\">
                        <div class=\"p-4 bg-white\">
                            <div class=\"d-flex justify-content-between mb-3\">
                                <div>
                                    <h6 class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>{{ camping.ville }}, {{ camping.pays }}</h6>
                                </div>
                                <div>
                                    <h6 class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>{{ camping.dateDeb|date('d M Y') }} - {{ camping.dateFin|date('d M Y') }}</h6>
                                </div>
                                <div>
                                    <h6 class=\"m-0\"><i class=\"fa fa-star text-primary mr-2\"></i>{{ averageRating ? averageRating|number_format(1) ~ '/5' : 'No ratings yet' }}</h6>
                                </div>
                            </div>
                            <h1>{{ camping.nom }}</h1>
                            <div class=\"border-top mt-4 pt-4\">
                                <h4 class=\"mb-3\">Description</h4>
                                <p>{{ camping.description|nl2br }}</p>
                            </div>
                            <div class=\"border-top mt-4 pt-4\">
                                <h4 class=\"mb-3\">Address</h4>
                                <p>{{ camping.adresse|nl2br }}</p>
                            </div>
                            
                            {% if app.session.get('user_id') and (camping.utilisateur and app.session.get('user_id') == camping.utilisateur.id or app.session.get('user_id') == 111 or (app.session.get('user_roles') is defined and 'ROLE_ADMIN' in app.session.get('user_roles'))) %}
                                <div class=\"border-top mt-4 pt-4\">
                                    <div class=\"d-flex justify-content-between\">
                                        <a href=\"{{ path('app_camping_edit', {'id': camping.id}) }}\" class=\"btn btn-primary\">Edit</a>
                                        <form method=\"post\" action=\"{{ path('app_camping_delete', {'id': camping.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this camping spot?');\">
                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ camping.id) }}\">
                                            <button class=\"btn btn-danger\">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
                
                <div class=\"col-lg-4\">
                    <div class=\"bg-white mb-4 p-4\">
                        <h3 class=\"mb-4\">Camping Owner</h3>
                        <div class=\"d-flex align-items-center mb-4\">
                            <img class=\"rounded-circle mr-3\" style=\"width: 60px; height: 60px;\" src=\"{{ camping.utilisateur.pdp ? asset('uploads/profile_images/' ~ camping.utilisateur.pdp) : asset('img/user.jpg') }}\" alt=\"{{ camping.utilisateur.nom }}\">
                            <div>
                                <h5>{{ camping.utilisateur.prenom }} {{ camping.utilisateur.nom }}</h5>
                                <p class=\"m-0\">{{ camping.utilisateur.email }}</p>
                            </div>
                        </div>
                        {% if camping.utilisateur.bio %}
                            <p>{{ camping.utilisateur.bio|nl2br }}</p>
                        {% endif %}
                    </div>
                    
                    <div class=\"bg-white mb-4 p-4\">
                        <h3 class=\"mb-4\">Reviews ({{ avis|length }})</h3>
                        {% if app.session.get('user_id') and camping.utilisateur and app.session.get('user_id') != camping.utilisateur.id %}
                            <a href=\"{{ path('app_avis_new', {'id': camping.id}) }}\" class=\"btn btn-primary btn-block mb-4\">Write a Review</a>
                        {% endif %}
                        
                        {% if avis is empty %}
                            <p>No reviews yet. Be the first to review this camping spot!</p>
                        {% else %}
                            {% for avi in avis %}
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
                                        {% if app.session.get('user_id') and (avi.utilisateur and app.session.get('user_id') == avi.utilisateur.id or app.session.get('user_id') == 111 or (app.session.get('user_roles') is defined and 'ROLE_ADMIN' in app.session.get('user_roles'))) %}
                                            <div>
                                                <a href=\"{{ path('app_avis_edit', {'id': avi.id}) }}\" class=\"btn btn-sm btn-outline-primary\"><i class=\"fa fa-edit\"></i></a>
                                                <form method=\"post\" action=\"{{ path('app_avis_delete', {'id': avi.id}) }}\" onsubmit=\"return confirm('Are you sure you want to delete this review?');\" style=\"display: inline-block;\">
                                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ avi.id) }}\">
                                                    <button class=\"btn btn-sm btn-outline-danger\"><i class=\"fa fa-trash\"></i></button>
                                                </form>
                                            </div>
                                        {% endif %}
                                    </div>
                                    {% if avi.commentaire %}
                                        <p class=\"m-0\">{{ avi.commentaire|nl2br }}</p>
                                    {% endif %}
                                </div>
                            {% endfor %}
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Camping Detail End -->

    <!-- Related Camping Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Related Camping Spots</h6>
                <h1>You May Also Like</h1>
            </div>
            <div class=\"row\">
                {% set relatedCount = 0 %}
                {% for related in campings %}
                    {% if related.id != camping.id and relatedCount < 3 %}
                        {% set relatedCount = relatedCount + 1 %}
                        <div class=\"col-lg-4 col-md-6 mb-4\">
                            <div class=\"package-item bg-white mb-2\">
                                <img class=\"img-fluid\" src=\"{{ asset('uploads/camping_images/' ~ related.image) }}\" alt=\"{{ related.nom }}\">
                                <div class=\"p-4\">
                                    <div class=\"d-flex justify-content-between mb-3\">
                                        <small class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>{{ related.ville }}, {{ related.pays }}</small>
                                        <small class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>{{ (related.dateFin|date('U') - related.dateDeb|date('U')) / 86400 }} days</small>
                                    </div>
                                    <a class=\"h5 text-decoration-none\" href=\"{{ path('app_camping_show', {'id': related.id}) }}\">{{ related.nom }}</a>
                                    <div class=\"border-top mt-4 pt-4\">
                                        <div class=\"d-flex justify-content-between\">
                                            <h6 class=\"m-0\"><i class=\"fa fa-calendar text-primary mr-2\"></i>{{ related.dateDeb|date('d M Y') }}</h6>
                                            <h5 class=\"m-0\"><a href=\"{{ path('app_camping_show', {'id': related.id}) }}\" class=\"btn btn-primary btn-sm\">View Details</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {% endif %}
                {% endfor %}
            </div>
        </div>
    </div>
    <!-- Related Camping End -->
{% endblock %}
", "front/camping/show.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/front/camping/show.html.twig");
    }
}
