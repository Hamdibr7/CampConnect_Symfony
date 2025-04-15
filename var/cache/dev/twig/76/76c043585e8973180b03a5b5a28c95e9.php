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

/* home/about.html.twig */
class __TwigTemplate_08b25ae12e94c9c303270c886245d75e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/about.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/about.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/about.html.twig", 1);
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

        yield "About Us - CampConnect";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">About Us</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5\">
            <div class=\"row\">
                <div class=\"col-lg-6\" style=\"min-height: 500px;\">
                    <div class=\"position-relative h-100\">
                        <img class=\"position-absolute w-100 h-100\" src=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/about.jpg"), "html", null, true);
        yield "\" style=\"object-fit: cover;\">
                    </div>
                </div>
                <div class=\"col-lg-6 pt-5 pb-lg-5\">
                    <div class=\"about-text bg-white p-4 p-lg-5 my-lg-5\">
                        <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">About Us</h6>
                        <h1 class=\"mb-3\">We Provide Best Camping Experience</h1>
                        <p>CampConnect is your gateway to discovering the most beautiful camping spots around the world. Whether you're looking for a peaceful retreat in nature or an adventure-filled outdoor experience, we've got you covered.</p>
                        <p>Our mission is to connect camping enthusiasts with the perfect outdoor destinations, providing detailed information, reviews, and booking options to make your camping experience unforgettable.</p>
                        <div class=\"row mb-4\">
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/about-1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            </div>
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/about-2.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class=\"container-fluid pb-5\">
        <div class=\"container pb-5\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"d-flex mb-4 mb-lg-0\">
                        <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 100px; width: 100px;\">
                            <i class=\"fa fa-2x fa-campground text-white\"></i>
                        </div>
                        <div class=\"d-flex flex-column\">
                            <h5 class=\"\">Best Camping Locations</h5>
                            <p class=\"m-0\">Discover handpicked camping spots that offer the perfect blend of comfort and adventure.</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"d-flex mb-4 mb-lg-0\">
                        <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 100px; width: 100px;\">
                            <i class=\"fa fa-2x fa-hiking text-white\"></i>
                        </div>
                        <div class=\"d-flex flex-column\">
                            <h5 class=\"\">Outdoor Activities</h5>
                            <p class=\"m-0\">Enjoy a variety of outdoor activities like hiking, fishing, and wildlife watching.</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"d-flex mb-4 mb-lg-0\">
                        <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 100px; width: 100px;\">
                            <i class=\"fa fa-2x fa-map-marked-alt text-white\"></i>
                        </div>
                        <div class=\"d-flex flex-column\">
                            <h5 class=\"\">Travel Guides</h5>
                            <p class=\"m-0\">Get expert advice and tips from our comprehensive camping guides and reviews.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Team Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Our Team</h6>
                <h1>Meet Our Expert Team</h1>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 104
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/team-1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">John Smith</h5>
                            <p class=\"m-0\">Founder & CEO</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/team-2.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">Sarah Johnson</h5>
                            <p class=\"m-0\">Head of Operations</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 138
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/team-3.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">Michael Brown</h5>
                            <p class=\"m-0\">Marketing Director</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/team-4.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">Jessica Williams</h5>
                            <p class=\"m-0\">Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
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
        return "home/about.html.twig";
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
        return array (  272 => 155,  252 => 138,  232 => 121,  212 => 104,  146 => 41,  140 => 38,  126 => 27,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}About Us - CampConnect{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">About Us</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">About</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5\">
            <div class=\"row\">
                <div class=\"col-lg-6\" style=\"min-height: 500px;\">
                    <div class=\"position-relative h-100\">
                        <img class=\"position-absolute w-100 h-100\" src=\"{{ asset('img/about.jpg') }}\" style=\"object-fit: cover;\">
                    </div>
                </div>
                <div class=\"col-lg-6 pt-5 pb-lg-5\">
                    <div class=\"about-text bg-white p-4 p-lg-5 my-lg-5\">
                        <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">About Us</h6>
                        <h1 class=\"mb-3\">We Provide Best Camping Experience</h1>
                        <p>CampConnect is your gateway to discovering the most beautiful camping spots around the world. Whether you're looking for a peaceful retreat in nature or an adventure-filled outdoor experience, we've got you covered.</p>
                        <p>Our mission is to connect camping enthusiasts with the perfect outdoor destinations, providing detailed information, reviews, and booking options to make your camping experience unforgettable.</p>
                        <div class=\"row mb-4\">
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"{{ asset('img/about-1.jpg') }}\" alt=\"\">
                            </div>
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"{{ asset('img/about-2.jpg') }}\" alt=\"\">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Feature Start -->
    <div class=\"container-fluid pb-5\">
        <div class=\"container pb-5\">
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"d-flex mb-4 mb-lg-0\">
                        <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 100px; width: 100px;\">
                            <i class=\"fa fa-2x fa-campground text-white\"></i>
                        </div>
                        <div class=\"d-flex flex-column\">
                            <h5 class=\"\">Best Camping Locations</h5>
                            <p class=\"m-0\">Discover handpicked camping spots that offer the perfect blend of comfort and adventure.</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"d-flex mb-4 mb-lg-0\">
                        <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 100px; width: 100px;\">
                            <i class=\"fa fa-2x fa-hiking text-white\"></i>
                        </div>
                        <div class=\"d-flex flex-column\">
                            <h5 class=\"\">Outdoor Activities</h5>
                            <p class=\"m-0\">Enjoy a variety of outdoor activities like hiking, fishing, and wildlife watching.</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"d-flex mb-4 mb-lg-0\">
                        <div class=\"d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3\" style=\"height: 100px; width: 100px;\">
                            <i class=\"fa fa-2x fa-map-marked-alt text-white\"></i>
                        </div>
                        <div class=\"d-flex flex-column\">
                            <h5 class=\"\">Travel Guides</h5>
                            <p class=\"m-0\">Get expert advice and tips from our comprehensive camping guides and reviews.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Team Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Our Team</h6>
                <h1>Meet Our Expert Team</h1>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"{{ asset('img/team-1.jpg') }}\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">John Smith</h5>
                            <p class=\"m-0\">Founder & CEO</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"{{ asset('img/team-2.jpg') }}\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">Sarah Johnson</h5>
                            <p class=\"m-0\">Head of Operations</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"{{ asset('img/team-3.jpg') }}\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">Michael Brown</h5>
                            <p class=\"m-0\">Marketing Director</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"{{ asset('img/team-4.jpg') }}\" alt=\"\">
                            <div class=\"team-social\">
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                                <a class=\"btn btn-outline-primary btn-square\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                            </div>
                        </div>
                        <div class=\"text-center py-4\">
                            <h5 class=\"text-truncate\">Jessica Williams</h5>
                            <p class=\"m-0\">Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
{% endblock %}
", "home/about.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/home/about.html.twig");
    }
}
