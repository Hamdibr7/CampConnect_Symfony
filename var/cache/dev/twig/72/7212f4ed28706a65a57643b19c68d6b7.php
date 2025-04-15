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

/* base.html.twig */
class __TwigTemplate_8ec07c56627fdfe5fcc068ad2855e4c1 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <title>";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
    <meta content=\"Camping, Outdoor, Adventure\" name=\"keywords\">
    <meta content=\"Find and book the best camping spots\" name=\"description\">

    <!-- Favicon -->
    <link href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.ico"), "html", null, true);
        yield "\" rel=\"icon\">

    <!-- Google Web Fonts -->
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap\" rel=\"stylesheet\"> 

    <!-- Font Awesome -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css\" rel=\"stylesheet\">

    <!-- Libraries Stylesheet -->
    <link href=\"";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/owlcarousel/assets/owl.carousel.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    
    ";
        // line 27
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 30
        yield "
    ";
        // line 31
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 34
        yield "</head>

<body>
    <!-- Topbar Start -->
    <div class=\"container-fluid bg-light pt-3 d-none d-lg-block\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-6 text-center text-lg-left mb-2 mb-lg-0\">
                    <div class=\"d-inline-flex align-items-center\">
                        <p><i class=\"fa fa-envelope mr-2\"></i>info@campconnect.com</p>
                        <p class=\"text-body px-3\">|</p>
                        <p><i class=\"fa fa-phone-alt mr-2\"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class=\"col-lg-6 text-center text-lg-right\">
                    <div class=\"d-inline-flex align-items-center\">
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-facebook-f\"></i>
                        </a>
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-twitter\"></i>
                        </a>
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-linkedin-in\"></i>
                        </a>
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-instagram\"></i>
                        </a>
                        <a class=\"text-primary pl-3\" href=\"\">
                            <i class=\"fab fa-youtube\"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class=\"container-fluid position-relative nav-bar p-0\">
        <div class=\"container-lg position-relative p-0 px-lg-3\" style=\"z-index: 9;\">
            <nav class=\"navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5\">
                <a href=\"";
        // line 76
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"navbar-brand\">
                    <h1 class=\"m-0 text-primary\"><span class=\"text-dark\">CAMP</span>CONNECT</h1>
                </a>
                <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse justify-content-between px-3\" id=\"navbarCollapse\">
                    <div class=\"navbar-nav ml-auto py-0\">
                        <a href=\"";
        // line 84
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"nav-item nav-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "request", [], "any", false, false, false, 84), "attributes", [], "any", false, false, false, 84), "get", ["_route"], "method", false, false, false, 84) == "app_home")) {
            yield "active";
        }
        yield "\">Home</a>
                        <a href=\"";
        // line 85
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\" class=\"nav-item nav-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 85, $this->source); })()), "request", [], "any", false, false, false, 85), "attributes", [], "any", false, false, false, 85), "get", ["_route"], "method", false, false, false, 85) == "app_about")) {
            yield "active";
        }
        yield "\">About</a>
                        <a href=\"";
        // line 86
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_index");
        yield "\" class=\"nav-item nav-link ";
        if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 86, $this->source); })()), "request", [], "any", false, false, false, 86), "attributes", [], "any", false, false, false, 86), "get", ["_route"], "method", false, false, false, 86)) && is_string($_v1 = "app_camping_") && str_starts_with($_v0, $_v1))) {
            yield "active";
        }
        yield "\">Campings</a>
                        ";
        // line 87
        if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 87, $this->source); })()), "session", [], "any", false, false, false, 87), "get", ["user_id"], "method", false, false, false, 87) == 111) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, true, false, 87), "get", ["user_roles"], "method", true, true, false, 87) && CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 87, $this->source); })()), "session", [], "any", false, false, false, 87), "get", ["user_roles"], "method", false, false, false, 87))))) {
            // line 88
            yield "                            <div class=\"nav-item dropdown\">
                                <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Admin</a>
                                <div class=\"dropdown-menu border-0 rounded-0 m-0\">
                                    <a href=\"";
            // line 91
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_camping_index");
            yield "\" class=\"dropdown-item\">Campings</a>
                                    <a href=\"";
            // line 92
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_avis_index");
            yield "\" class=\"dropdown-item\">Avis</a>
                                </div>
                            </div>
                        ";
        }
        // line 96
        yield "                        <a href=\"";
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\" class=\"nav-item nav-link ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 96, $this->source); })()), "request", [], "any", false, false, false, 96), "attributes", [], "any", false, false, false, 96), "get", ["_route"], "method", false, false, false, 96) == "app_contact")) {
            yield "active";
        }
        yield "\">Contact</a>
                        ";
        // line 97
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 97, $this->source); })()), "session", [], "any", false, false, false, 97), "get", ["user_id"], "method", false, false, false, 97)) {
            // line 98
            yield "                            <div class=\"nav-item dropdown\">
                                <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">";
            // line 99
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 99, $this->source); })()), "session", [], "any", false, false, false, 99), "get", ["user_email"], "method", false, false, false, 99), "html", null, true);
            yield "</a>
                                <div class=\"dropdown-menu border-0 rounded-0 m-0\">
                                    <a href=\"#\" class=\"dropdown-item\">Profile</a>
                                    <a href=\"";
            // line 102
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"dropdown-item\">Logout</a>
                                </div>
                            </div>
                        ";
        } else {
            // line 106
            yield "                            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"nav-item nav-link\">Login</a>
                            <a href=\"";
            // line 107
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"nav-item nav-link\">Register</a>
                        ";
        }
        // line 109
        yield "                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    ";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 116, $this->source); })()), "flashes", [], "any", false, false, false, 116));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 117
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 118
                yield "            <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield " alert-dismissible fade show\" role=\"alert\">
                ";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 125
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        yield "
    ";
        // line 127
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 128
        yield "
    <!-- Footer Start -->
    <div class=\"container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5\" style=\"margin-top: 90px;\">
        <div class=\"row pt-5\">
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <a href=\"";
        // line 133
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"navbar-brand\">
                    <h1 class=\"text-primary\"><span class=\"text-white\">CAMP</span>CONNECT</h1>
                </a>
                <p>Find your perfect camping spot with CampConnect. Explore beautiful camping destinations around the world.</p>
                <h6 class=\"text-white text-uppercase mt-4 mb-3\" style=\"letter-spacing: 5px;\">Follow Us</h6>
                <div class=\"d-flex justify-content-start\">
                    <a class=\"btn btn-outline-primary btn-square mr-2\" href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                    <a class=\"btn btn-outline-primary btn-square mr-2\" href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                    <a class=\"btn btn-outline-primary btn-square mr-2\" href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                    <a class=\"btn btn-outline-primary btn-square\" href=\"#\"><i class=\"fab fa-instagram\"></i></a>
                </div>
            </div>
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"text-white text-uppercase mb-4\" style=\"letter-spacing: 5px;\">Our Services</h5>
                <div class=\"d-flex flex-column justify-content-start\">
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Camping Reservations</a>
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Outdoor Activities</a>
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Camping Gear</a>
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Travel Guides</a>
                    <a class=\"text-white-50\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Customer Support</a>
                </div>
            </div>
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"text-white text-uppercase mb-4\" style=\"letter-spacing: 5px;\">Useful Links</h5>
                <div class=\"d-flex flex-column justify-content-start\">
                    <a class=\"text-white-50 mb-2\" href=\"";
        // line 158
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\"><i class=\"fa fa-angle-right mr-2\"></i>Home</a>
                    <a class=\"text-white-50 mb-2\" href=\"";
        // line 159
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\"><i class=\"fa fa-angle-right mr-2\"></i>About</a>
                    <a class=\"text-white-50 mb-2\" href=\"";
        // line 160
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_index");
        yield "\"><i class=\"fa fa-angle-right mr-2\"></i>Campings</a>
                    <a class=\"text-white-50\" href=\"";
        // line 161
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\"><i class=\"fa fa-angle-right mr-2\"></i>Contact</a>
                </div>
            </div>
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"text-white text-uppercase mb-4\" style=\"letter-spacing: 5px;\">Contact Us</h5>
                <p><i class=\"fa fa-map-marker-alt mr-2\"></i>123 Street, New York, USA</p>
                <p><i class=\"fa fa-phone-alt mr-2\"></i>+012 345 67890</p>
                <p><i class=\"fa fa-envelope mr-2\"></i>info@campconnect.com</p>
                <h6 class=\"text-white text-uppercase mt-4 mb-3\" style=\"letter-spacing: 5px;\">Newsletter</h6>
                <div class=\"w-100\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control border-light\" style=\"padding: 25px;\" placeholder=\"Your Email\">
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-primary px-3\">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5\" style=\"border-color: rgba(256, 256, 256, .1) !important;\">
        <div class=\"row\">
            <div class=\"col-lg-6 text-center text-md-left mb-3 mb-md-0\">
                <p class=\"m-0 text-white-50\">Copyright &copy; <a href=\"#\">CampConnect</a>. All Rights Reserved.</p>
            </div>
            <div class=\"col-lg-6 text-center text-md-right\">
                <p class=\"m-0 text-white-50\">Designed by <a href=\"#\">CampConnect Team</a></p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href=\"#\" class=\"btn btn-lg btn-primary btn-lg-square back-to-top\"><i class=\"fa fa-angle-double-up\"></i></a>

    <!-- JavaScript Libraries -->
    <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js\"></script>
    <script src=\"";
        // line 199
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/easing/easing.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 200
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/owlcarousel/owl.carousel.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 201
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/tempusdominus/js/moment.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/tempusdominus/js/moment-timezone.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 203
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"), "html", null, true);
        yield "\"></script>

    <!-- Template Javascript -->
    <script src=\"";
        // line 206
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/main.js"), "html", null, true);
        yield "\"></script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
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

        yield "CampConnect - Find Your Perfect Camping Spot";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 27
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

        // line 28
        yield "        ";
        // line 29
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 32
        yield "        ";
        // line 33
        yield "    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 127
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  482 => 127,  471 => 33,  469 => 32,  456 => 31,  445 => 29,  443 => 28,  430 => 27,  407 => 5,  392 => 206,  386 => 203,  382 => 202,  378 => 201,  374 => 200,  370 => 199,  329 => 161,  325 => 160,  321 => 159,  317 => 158,  289 => 133,  282 => 128,  280 => 127,  277 => 126,  271 => 125,  259 => 119,  254 => 118,  249 => 117,  245 => 116,  236 => 109,  231 => 107,  226 => 106,  219 => 102,  213 => 99,  210 => 98,  208 => 97,  199 => 96,  192 => 92,  188 => 91,  183 => 88,  181 => 87,  173 => 86,  165 => 85,  157 => 84,  146 => 76,  102 => 34,  100 => 31,  97 => 30,  95 => 27,  90 => 25,  84 => 22,  80 => 21,  67 => 11,  58 => 5,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"utf-8\">
    <title>{% block title %}CampConnect - Find Your Perfect Camping Spot{% endblock %}</title>
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">
    <meta content=\"Camping, Outdoor, Adventure\" name=\"keywords\">
    <meta content=\"Find and book the best camping spots\" name=\"description\">

    <!-- Favicon -->
    <link href=\"{{ asset('favicon.ico') }}\" rel=\"icon\">

    <!-- Google Web Fonts -->
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
    <link href=\"https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap\" rel=\"stylesheet\"> 

    <!-- Font Awesome -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css\" rel=\"stylesheet\">

    <!-- Libraries Stylesheet -->
    <link href=\"{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}\" rel=\"stylesheet\" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href=\"{{ asset('css/style.css') }}\" rel=\"stylesheet\">
    
    {% block stylesheets %}
        {# {{ encore_entry_link_tags('app') }} #}
    {% endblock %}

    {% block javascripts %}
        {# {{ encore_entry_script_tags('app') }} #}
    {% endblock %}
</head>

<body>
    <!-- Topbar Start -->
    <div class=\"container-fluid bg-light pt-3 d-none d-lg-block\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-6 text-center text-lg-left mb-2 mb-lg-0\">
                    <div class=\"d-inline-flex align-items-center\">
                        <p><i class=\"fa fa-envelope mr-2\"></i>info@campconnect.com</p>
                        <p class=\"text-body px-3\">|</p>
                        <p><i class=\"fa fa-phone-alt mr-2\"></i>+012 345 6789</p>
                    </div>
                </div>
                <div class=\"col-lg-6 text-center text-lg-right\">
                    <div class=\"d-inline-flex align-items-center\">
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-facebook-f\"></i>
                        </a>
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-twitter\"></i>
                        </a>
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-linkedin-in\"></i>
                        </a>
                        <a class=\"text-primary px-3\" href=\"\">
                            <i class=\"fab fa-instagram\"></i>
                        </a>
                        <a class=\"text-primary pl-3\" href=\"\">
                            <i class=\"fab fa-youtube\"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class=\"container-fluid position-relative nav-bar p-0\">
        <div class=\"container-lg position-relative p-0 px-lg-3\" style=\"z-index: 9;\">
            <nav class=\"navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5\">
                <a href=\"{{ path('app_home') }}\" class=\"navbar-brand\">
                    <h1 class=\"m-0 text-primary\"><span class=\"text-dark\">CAMP</span>CONNECT</h1>
                </a>
                <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                <div class=\"collapse navbar-collapse justify-content-between px-3\" id=\"navbarCollapse\">
                    <div class=\"navbar-nav ml-auto py-0\">
                        <a href=\"{{ path('app_home') }}\" class=\"nav-item nav-link {% if app.request.attributes.get('_route') == 'app_home' %}active{% endif %}\">Home</a>
                        <a href=\"{{ path('app_about') }}\" class=\"nav-item nav-link {% if app.request.attributes.get('_route') == 'app_about' %}active{% endif %}\">About</a>
                        <a href=\"{{ path('app_camping_index') }}\" class=\"nav-item nav-link {% if app.request.attributes.get('_route') starts with 'app_camping_' %}active{% endif %}\">Campings</a>
                        {% if app.session.get('user_id') == 111 or (app.session.get('user_roles') is defined and 'ROLE_ADMIN' in app.session.get('user_roles')) %}
                            <div class=\"nav-item dropdown\">
                                <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Admin</a>
                                <div class=\"dropdown-menu border-0 rounded-0 m-0\">
                                    <a href=\"{{ path('app_admin_camping_index') }}\" class=\"dropdown-item\">Campings</a>
                                    <a href=\"{{ path('app_admin_avis_index') }}\" class=\"dropdown-item\">Avis</a>
                                </div>
                            </div>
                        {% endif %}
                        <a href=\"{{ path('app_contact') }}\" class=\"nav-item nav-link {% if app.request.attributes.get('_route') == 'app_contact' %}active{% endif %}\">Contact</a>
                        {% if app.session.get('user_id') %}
                            <div class=\"nav-item dropdown\">
                                <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">{{ app.session.get('user_email') }}</a>
                                <div class=\"dropdown-menu border-0 rounded-0 m-0\">
                                    <a href=\"#\" class=\"dropdown-item\">Profile</a>
                                    <a href=\"{{ path('app_logout') }}\" class=\"dropdown-item\">Logout</a>
                                </div>
                            </div>
                        {% else %}
                            <a href=\"{{ path('app_login') }}\" class=\"nav-item nav-link\">Login</a>
                            <a href=\"{{ path('app_register') }}\" class=\"nav-item nav-link\">Register</a>
                        {% endif %}
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    {% for label, messages in app.flashes %}
        {% for message in messages %}
            <div class=\"alert alert-{{ label }} alert-dismissible fade show\" role=\"alert\">
                {{ message }}
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>
        {% endfor %}
    {% endfor %}

    {% block body %}{% endblock %}

    <!-- Footer Start -->
    <div class=\"container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5\" style=\"margin-top: 90px;\">
        <div class=\"row pt-5\">
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <a href=\"{{ path('app_home') }}\" class=\"navbar-brand\">
                    <h1 class=\"text-primary\"><span class=\"text-white\">CAMP</span>CONNECT</h1>
                </a>
                <p>Find your perfect camping spot with CampConnect. Explore beautiful camping destinations around the world.</p>
                <h6 class=\"text-white text-uppercase mt-4 mb-3\" style=\"letter-spacing: 5px;\">Follow Us</h6>
                <div class=\"d-flex justify-content-start\">
                    <a class=\"btn btn-outline-primary btn-square mr-2\" href=\"#\"><i class=\"fab fa-twitter\"></i></a>
                    <a class=\"btn btn-outline-primary btn-square mr-2\" href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>
                    <a class=\"btn btn-outline-primary btn-square mr-2\" href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>
                    <a class=\"btn btn-outline-primary btn-square\" href=\"#\"><i class=\"fab fa-instagram\"></i></a>
                </div>
            </div>
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"text-white text-uppercase mb-4\" style=\"letter-spacing: 5px;\">Our Services</h5>
                <div class=\"d-flex flex-column justify-content-start\">
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Camping Reservations</a>
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Outdoor Activities</a>
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Camping Gear</a>
                    <a class=\"text-white-50 mb-2\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Travel Guides</a>
                    <a class=\"text-white-50\" href=\"#\"><i class=\"fa fa-angle-right mr-2\"></i>Customer Support</a>
                </div>
            </div>
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"text-white text-uppercase mb-4\" style=\"letter-spacing: 5px;\">Useful Links</h5>
                <div class=\"d-flex flex-column justify-content-start\">
                    <a class=\"text-white-50 mb-2\" href=\"{{ path('app_home') }}\"><i class=\"fa fa-angle-right mr-2\"></i>Home</a>
                    <a class=\"text-white-50 mb-2\" href=\"{{ path('app_about') }}\"><i class=\"fa fa-angle-right mr-2\"></i>About</a>
                    <a class=\"text-white-50 mb-2\" href=\"{{ path('app_camping_index') }}\"><i class=\"fa fa-angle-right mr-2\"></i>Campings</a>
                    <a class=\"text-white-50\" href=\"{{ path('app_contact') }}\"><i class=\"fa fa-angle-right mr-2\"></i>Contact</a>
                </div>
            </div>
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"text-white text-uppercase mb-4\" style=\"letter-spacing: 5px;\">Contact Us</h5>
                <p><i class=\"fa fa-map-marker-alt mr-2\"></i>123 Street, New York, USA</p>
                <p><i class=\"fa fa-phone-alt mr-2\"></i>+012 345 67890</p>
                <p><i class=\"fa fa-envelope mr-2\"></i>info@campconnect.com</p>
                <h6 class=\"text-white text-uppercase mt-4 mb-3\" style=\"letter-spacing: 5px;\">Newsletter</h6>
                <div class=\"w-100\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control border-light\" style=\"padding: 25px;\" placeholder=\"Your Email\">
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-primary px-3\">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5\" style=\"border-color: rgba(256, 256, 256, .1) !important;\">
        <div class=\"row\">
            <div class=\"col-lg-6 text-center text-md-left mb-3 mb-md-0\">
                <p class=\"m-0 text-white-50\">Copyright &copy; <a href=\"#\">CampConnect</a>. All Rights Reserved.</p>
            </div>
            <div class=\"col-lg-6 text-center text-md-right\">
                <p class=\"m-0 text-white-50\">Designed by <a href=\"#\">CampConnect Team</a></p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href=\"#\" class=\"btn btn-lg btn-primary btn-lg-square back-to-top\"><i class=\"fa fa-angle-double-up\"></i></a>

    <!-- JavaScript Libraries -->
    <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
    <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js\"></script>
    <script src=\"{{ asset('lib/easing/easing.min.js') }}\"></script>
    <script src=\"{{ asset('lib/owlcarousel/owl.carousel.min.js') }}\"></script>
    <script src=\"{{ asset('lib/tempusdominus/js/moment.min.js') }}\"></script>
    <script src=\"{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}\"></script>
    <script src=\"{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}\"></script>

    <!-- Template Javascript -->
    <script src=\"{{ asset('js/main.js') }}\"></script>
</body>
</html>
", "base.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/base.html.twig");
    }
}
