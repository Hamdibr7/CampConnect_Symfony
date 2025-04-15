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

/* home/contact.html.twig */
class __TwigTemplate_69a8a087116b3fe56f8834ea5d411041 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/contact.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/contact.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/contact.html.twig", 1);
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

        yield "Contact Us - CampConnect";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Contact Us</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container py-5\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Contact</h6>
                <h1>Contact For Any Query</h1>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-7\">
                    <div class=\"contact-form bg-white mb-5\" style=\"padding: 30px;\">
                        <div id=\"success\"></div>
                        <form name=\"sentMessage\" id=\"contactForm\" novalidate=\"novalidate\">
                            <div class=\"form-row\">
                                <div class=\"col-sm-6 control-group\">
                                    <input type=\"text\" class=\"form-control p-4\" id=\"name\" placeholder=\"Your Name\"
                                        required=\"required\" data-validation-required-message=\"Please enter your name\" />
                                    <p class=\"help-block text-danger\"></p>
                                </div>
                                <div class=\"col-sm-6 control-group\">
                                    <input type=\"email\" class=\"form-control p-4\" id=\"email\" placeholder=\"Your Email\"
                                        required=\"required\" data-validation-required-message=\"Please enter your email\" />
                                    <p class=\"help-block text-danger\"></p>
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <input type=\"text\" class=\"form-control p-4\" id=\"subject\" placeholder=\"Subject\"
                                    required=\"required\" data-validation-required-message=\"Please enter a subject\" />
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"control-group\">
                                <textarea class=\"form-control py-3 px-4\" rows=\"5\" id=\"message\" placeholder=\"Message\"
                                    required=\"required\"
                                    data-validation-required-message=\"Please enter your message\"></textarea>
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"text-center\">
                                <button class=\"btn btn-primary py-3 px-4\" type=\"submit\" id=\"sendMessageButton\">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=\"col-lg-5\">
                    <div class=\"bg-white p-5 mb-5\">
                        <div class=\"d-flex align-items-center mb-4\">
                            <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 60px; width: 60px;\">
                                <i class=\"fa fa-2x fa-map-marker-alt text-white\"></i>
                            </div>
                            <div class=\"d-flex flex-column\">
                                <h5>Our Office</h5>
                                <p class=\"m-0\">123 Street, New York, USA</p>
                            </div>
                        </div>
                        <div class=\"d-flex align-items-center mb-4\">
                            <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 60px; width: 60px;\">
                                <i class=\"fa fa-2x fa-phone-alt text-white\"></i>
                            </div>
                            <div class=\"d-flex flex-column\">
                                <h5>Call Us</h5>
                                <p class=\"m-0\">+012 345 6789</p>
                            </div>
                        </div>
                        <div class=\"d-flex align-items-center\">
                            <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 60px; width: 60px;\">
                                <i class=\"fa fa-2x fa-envelope text-white\"></i>
                            </div>
                            <div class=\"d-flex flex-column\">
                                <h5>Email Us</h5>
                                <p class=\"m-0\">info@campconnect.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Map Start -->
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-lg-12 p-0\">
                <div class=\"mapouter\">
                    <div class=\"gmap_canvas\">
                        <iframe width=\"100%\" height=\"450\" id=\"gmap_canvas\"
                            src=\"https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed\"
                            frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Map End -->
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
        return "home/contact.html.twig";
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
        return array (  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Contact Us - CampConnect{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Contact Us</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Contact</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container py-5\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Contact</h6>
                <h1>Contact For Any Query</h1>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-7\">
                    <div class=\"contact-form bg-white mb-5\" style=\"padding: 30px;\">
                        <div id=\"success\"></div>
                        <form name=\"sentMessage\" id=\"contactForm\" novalidate=\"novalidate\">
                            <div class=\"form-row\">
                                <div class=\"col-sm-6 control-group\">
                                    <input type=\"text\" class=\"form-control p-4\" id=\"name\" placeholder=\"Your Name\"
                                        required=\"required\" data-validation-required-message=\"Please enter your name\" />
                                    <p class=\"help-block text-danger\"></p>
                                </div>
                                <div class=\"col-sm-6 control-group\">
                                    <input type=\"email\" class=\"form-control p-4\" id=\"email\" placeholder=\"Your Email\"
                                        required=\"required\" data-validation-required-message=\"Please enter your email\" />
                                    <p class=\"help-block text-danger\"></p>
                                </div>
                            </div>
                            <div class=\"control-group\">
                                <input type=\"text\" class=\"form-control p-4\" id=\"subject\" placeholder=\"Subject\"
                                    required=\"required\" data-validation-required-message=\"Please enter a subject\" />
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"control-group\">
                                <textarea class=\"form-control py-3 px-4\" rows=\"5\" id=\"message\" placeholder=\"Message\"
                                    required=\"required\"
                                    data-validation-required-message=\"Please enter your message\"></textarea>
                                <p class=\"help-block text-danger\"></p>
                            </div>
                            <div class=\"text-center\">
                                <button class=\"btn btn-primary py-3 px-4\" type=\"submit\" id=\"sendMessageButton\">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=\"col-lg-5\">
                    <div class=\"bg-white p-5 mb-5\">
                        <div class=\"d-flex align-items-center mb-4\">
                            <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 60px; width: 60px;\">
                                <i class=\"fa fa-2x fa-map-marker-alt text-white\"></i>
                            </div>
                            <div class=\"d-flex flex-column\">
                                <h5>Our Office</h5>
                                <p class=\"m-0\">123 Street, New York, USA</p>
                            </div>
                        </div>
                        <div class=\"d-flex align-items-center mb-4\">
                            <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 60px; width: 60px;\">
                                <i class=\"fa fa-2x fa-phone-alt text-white\"></i>
                            </div>
                            <div class=\"d-flex flex-column\">
                                <h5>Call Us</h5>
                                <p class=\"m-0\">+012 345 6789</p>
                            </div>
                        </div>
                        <div class=\"d-flex align-items-center\">
                            <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 60px; width: 60px;\">
                                <i class=\"fa fa-2x fa-envelope text-white\"></i>
                            </div>
                            <div class=\"d-flex flex-column\">
                                <h5>Email Us</h5>
                                <p class=\"m-0\">info@campconnect.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Map Start -->
    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-lg-12 p-0\">
                <div class=\"mapouter\">
                    <div class=\"gmap_canvas\">
                        <iframe width=\"100%\" height=\"450\" id=\"gmap_canvas\"
                            src=\"https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed\"
                            frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Map End -->
{% endblock %}
", "home/contact.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/home/contact.html.twig");
    }
}
