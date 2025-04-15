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

/* home/index.html.twig */
class __TwigTemplate_daf180b863713b078575d799780643d4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
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

        yield "CampConnect - Find Your Perfect Camping Spot";
        
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
                <h3 class=\"display-4 text-white text-uppercase\">Discover Amazing Camping Spots</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Explore</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
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
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"keyword\" class=\"form-control p-4\" placeholder=\"Search Keyword\">
                                    </div>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"pays\" class=\"form-control p-4\" placeholder=\"Country\">
                                    </div>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"ville\" class=\"form-control p-4\" placeholder=\"City\">
                                    </div>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <div class=\"date\" id=\"date1\" data-target-input=\"nearest\">
                                            <input type=\"text\" class=\"form-control p-4 datetimepicker-input\" placeholder=\"Date\" data-target=\"#date1\" data-toggle=\"datetimepicker\"/>
                                        </div>
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
    <!-- Booking End -->

    <!-- About Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5\">
            <div class=\"row\">
                <div class=\"col-lg-6\" style=\"min-height: 500px;\">
                    <div class=\"position-relative h-100\">
                        <img class=\"position-absolute w-100 h-100\" src=\"";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/about.jpg"), "html", null, true);
        yield "\" style=\"object-fit: cover;\">
                    </div>
                </div>
                <div class=\"col-lg-6 pt-5 pb-lg-5\">
                    <div class=\"about-text bg-white p-4 p-lg-5 my-lg-5\">
                        <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">About Us</h6>
                        <h1 class=\"mb-3\">We Provide Best Camping Experience</h1>
                        <p>CampConnect is your gateway to discovering the most beautiful camping spots around the world. Whether you're looking for a peaceful retreat in nature or an adventure-filled outdoor experience, we've got you covered.</p>
                        <div class=\"row mb-4\">
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/about-1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            </div>
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/about-2.jpg"), "html", null, true);
        yield "\" alt=\"\">
                            </div>
                        </div>
                        <a href=\"";
        // line 85
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_about");
        yield "\" class=\"btn btn-primary mt-1\">Learn More</a>
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

    <!-- Packages Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Camping Spots</h6>
                <h1>Perfect Camping Destinations</h1>
            </div>
            <div class=\"row\">
                ";
        // line 143
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["featuredCampings"]) || array_key_exists("featuredCampings", $context) ? $context["featuredCampings"] : (function () { throw new RuntimeError('Variable "featuredCampings" does not exist.', 143, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["camping"]) {
            // line 144
            yield "                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"package-item bg-white mb-2\">
                            <img class=\"img-fluid\" src=\"";
            // line 146
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/camping_images/" . CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "image", [], "any", false, false, false, 146))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "nom", [], "any", false, false, false, 146), "html", null, true);
            yield "\">
                            <div class=\"p-4\">
                                <div class=\"d-flex justify-content-between mb-3\">
                                    <small class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>";
            // line 149
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "ville", [], "any", false, false, false, 149), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "pays", [], "any", false, false, false, 149), "html", null, true);
            yield "</small>
                                    <small class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateFin", [], "any", false, false, false, 150), "U") - $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateDeb", [], "any", false, false, false, 150), "U")) / 86400), "html", null, true);
            yield " days</small>
                                    <small class=\"m-0\"><i class=\"fa fa-star text-primary mr-2\"></i>";
            // line 151
            yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["campingRatings"]) || array_key_exists("campingRatings", $context) ? $context["campingRatings"] : (function () { throw new RuntimeError('Variable "campingRatings" does not exist.', 151, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 151), [], "array", false, false, false, 151)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["campingRatings"]) || array_key_exists("campingRatings", $context) ? $context["campingRatings"] : (function () { throw new RuntimeError('Variable "campingRatings" does not exist.', 151, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 151), [], "array", false, false, false, 151), 1), "html", null, true)) : ("N/A"));
            yield "</small>
                                </div>
                                <a class=\"h5 text-decoration-none\" href=\"";
            // line 153
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 153)]), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "nom", [], "any", false, false, false, 153), "html", null, true);
            yield "</a>
                                <div class=\"border-top mt-4 pt-4\">
                                    <div class=\"d-flex justify-content-between\">
                                        <h6 class=\"m-0\"><i class=\"fa fa-calendar text-primary mr-2\"></i>";
            // line 156
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateDeb", [], "any", false, false, false, 156), "d M Y"), "html", null, true);
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "dateFin", [], "any", false, false, false, 156), "d M Y"), "html", null, true);
            yield "</h6>
                                        <h5 class=\"m-0\"><a href=\"";
            // line 157
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["camping"], "id", [], "any", false, false, false, 157)]), "html", null, true);
            yield "\" class=\"btn btn-primary btn-sm\">View Details</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            $context['_iterated'] = true;
        }
        // line 163
        if (!$context['_iterated']) {
            // line 164
            yield "                    <div class=\"col-12 text-center\">
                        <p>No camping spots available yet. <a href=\"";
            // line 165
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_camping_new");
            yield "\">Add one now!</a></p>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['camping'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        yield "            </div>
        </div>
    </div>
    <!-- Packages End -->

    <!-- Registration Start -->
    <div class=\"container-fluid bg-registration py-5\" style=\"margin: 90px 0;\">
        <div class=\"container py-5\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-7 mb-5 mb-lg-0\">
                    <div class=\"mb-4\">
                        <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Mega Offer</h6>
                        <h1 class=\"text-white\"><span class=\"text-primary\">30% OFF</span> For Camping Enthusiasts</h1>
                    </div>
                    <p class=\"text-white\">Join our community of camping enthusiasts and get exclusive access to premium camping spots. Register now and enjoy special discounts on your first booking!</p>
                    <ul class=\"list-inline text-white m-0\">
                        <li class=\"py-2\"><i class=\"fa fa-check text-primary mr-3\"></i>Access to exclusive camping spots</li>
                        <li class=\"py-2\"><i class=\"fa fa-check text-primary mr-3\"></i>Special discounts and offers</li>
                        <li class=\"py-2\"><i class=\"fa fa-check text-primary mr-3\"></i>Connect with other camping enthusiasts</li>
                    </ul>
                </div>
                <div class=\"col-lg-5\">
                    <div class=\"card border-0\">
                        <div class=\"card-header bg-primary text-center p-4\">
                            <h1 class=\"text-white m-0\">Sign Up Now</h1>
                        </div>
                        <div class=\"card-body rounded-bottom bg-white p-5\">
                            <form>
                                <div class=\"form-group\">
                                    <input type=\"text\" class=\"form-control p-4\" placeholder=\"Your name\" required=\"required\" />
                                </div>
                                <div class=\"form-group\">
                                    <input type=\"email\" class=\"form-control p-4\" placeholder=\"Your email\" required=\"required\" />
                                </div>
                                <div class=\"form-group\">
                                    <input type=\"password\" class=\"form-control p-4\" placeholder=\"Your password\" required=\"required\" />
                                </div>
                                <div>
                                    <button class=\"btn btn-primary btn-block py-3\" type=\"submit\">Sign Up Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

    <!-- Team Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Guides</h6>
                <h1>Our Travel Guides</h1>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 228
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
                            <p class=\"m-0\">Mountain Expert</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 245
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
                            <p class=\"m-0\">Forest Guide</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 262
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
                            <p class=\"m-0\">Lakeside Expert</p>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-6 pb-2\">
                    <div class=\"team-item bg-white mb-4\">
                        <div class=\"team-img position-relative overflow-hidden\">
                            <img class=\"img-fluid w-100\" src=\"";
        // line 279
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
                            <p class=\"m-0\">Desert Guide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container py-5\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Testimonial</h6>
                <h1>What Say Our Clients</h1>
            </div>
            <div class=\"owl-carousel testimonial-carousel\">
                <div class=\"text-center pb-4\">
                    <img class=\"img-fluid mx-auto\" src=\"";
        // line 307
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/testimonial-1.jpg"), "html", null, true);
        yield "\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">CampConnect helped me find the perfect camping spot for my family vacation. The booking process was seamless, and the campsite exceeded our expectations!
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class=\"text-center\">
                    <img class=\"img-fluid mx-auto\" src=\"";
        // line 316
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/testimonial-2.jpg"), "html", null, true);
        yield "\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">I've been using CampConnect for all my camping adventures. The reviews and ratings are accurate, and I love discovering new camping spots through this platform.
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class=\"text-center\">
                    <img class=\"img-fluid mx-auto\" src=\"";
        // line 325
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/testimonial-3.jpg"), "html", null, true);
        yield "\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">As a camping enthusiast, I highly recommend CampConnect. The detailed descriptions and photos of each camping spot make it easy to choose the right place for your adventure.
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class=\"text-center\">
                    <img class=\"img-fluid mx-auto\" src=\"";
        // line 334
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/testimonial-4.jpg"), "html", null, true);
        yield "\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">CampConnect has transformed the way I plan my camping trips. The user-friendly interface and helpful community make it a must-have resource for any outdoor enthusiast.
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
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
        return "home/index.html.twig";
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
        return array (  517 => 334,  505 => 325,  493 => 316,  481 => 307,  450 => 279,  430 => 262,  410 => 245,  390 => 228,  328 => 168,  319 => 165,  316 => 164,  314 => 163,  303 => 157,  297 => 156,  289 => 153,  284 => 151,  280 => 150,  274 => 149,  266 => 146,  262 => 144,  257 => 143,  196 => 85,  190 => 82,  184 => 79,  171 => 69,  124 => 25,  108 => 12,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}CampConnect - Find Your Perfect Camping Spot{% endblock %}

{% block body %}
    <!-- Header Start -->
    <div class=\"container-fluid page-header\">
        <div class=\"container\">
            <div class=\"d-flex flex-column align-items-center justify-content-center\" style=\"min-height: 400px\">
                <h3 class=\"display-4 text-white text-uppercase\">Discover Amazing Camping Spots</h3>
                <div class=\"d-inline-flex text-white\">
                    <p class=\"m-0 text-uppercase\"><a class=\"text-white\" href=\"{{ path('app_home') }}\">Home</a></p>
                    <i class=\"fa fa-angle-double-right pt-1 px-3\"></i>
                    <p class=\"m-0 text-uppercase\">Explore</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Booking Start -->
    <div class=\"container-fluid booking mt-5 pb-5\">
        <div class=\"container pb-5\">
            <div class=\"bg-light shadow\" style=\"padding: 30px;\">
                <form action=\"{{ path('app_camping_index') }}\" method=\"get\">
                    <div class=\"row align-items-center\" style=\"min-height: 60px;\">
                        <div class=\"col-md-10\">
                            <div class=\"row\">
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"keyword\" class=\"form-control p-4\" placeholder=\"Search Keyword\">
                                    </div>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"pays\" class=\"form-control p-4\" placeholder=\"Country\">
                                    </div>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <input type=\"text\" name=\"ville\" class=\"form-control p-4\" placeholder=\"City\">
                                    </div>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"mb-3 mb-md-0\">
                                        <div class=\"date\" id=\"date1\" data-target-input=\"nearest\">
                                            <input type=\"text\" class=\"form-control p-4 datetimepicker-input\" placeholder=\"Date\" data-target=\"#date1\" data-toggle=\"datetimepicker\"/>
                                        </div>
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
    <!-- Booking End -->

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
                        <div class=\"row mb-4\">
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"{{ asset('img/about-1.jpg') }}\" alt=\"\">
                            </div>
                            <div class=\"col-6\">
                                <img class=\"img-fluid\" src=\"{{ asset('img/about-2.jpg') }}\" alt=\"\">
                            </div>
                        </div>
                        <a href=\"{{ path('app_about') }}\" class=\"btn btn-primary mt-1\">Learn More</a>
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

    <!-- Packages Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Camping Spots</h6>
                <h1>Perfect Camping Destinations</h1>
            </div>
            <div class=\"row\">
                {% for camping in featuredCampings %}
                    <div class=\"col-lg-4 col-md-6 mb-4\">
                        <div class=\"package-item bg-white mb-2\">
                            <img class=\"img-fluid\" src=\"{{ asset('uploads/camping_images/' ~ camping.image) }}\" alt=\"{{ camping.nom }}\">
                            <div class=\"p-4\">
                                <div class=\"d-flex justify-content-between mb-3\">
                                    <small class=\"m-0\"><i class=\"fa fa-map-marker-alt text-primary mr-2\"></i>{{ camping.ville }}, {{ camping.pays }}</small>
                                    <small class=\"m-0\"><i class=\"fa fa-calendar-alt text-primary mr-2\"></i>{{ (camping.dateFin|date('U') - camping.dateDeb|date('U')) / 86400 }} days</small>
                                    <small class=\"m-0\"><i class=\"fa fa-star text-primary mr-2\"></i>{{ campingRatings[camping.id] ? campingRatings[camping.id]|number_format(1) : 'N/A' }}</small>
                                </div>
                                <a class=\"h5 text-decoration-none\" href=\"{{ path('app_camping_show', {'id': camping.id}) }}\">{{ camping.nom }}</a>
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
                        <p>No camping spots available yet. <a href=\"{{ path('app_camping_new') }}\">Add one now!</a></p>
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <!-- Packages End -->

    <!-- Registration Start -->
    <div class=\"container-fluid bg-registration py-5\" style=\"margin: 90px 0;\">
        <div class=\"container py-5\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-7 mb-5 mb-lg-0\">
                    <div class=\"mb-4\">
                        <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Mega Offer</h6>
                        <h1 class=\"text-white\"><span class=\"text-primary\">30% OFF</span> For Camping Enthusiasts</h1>
                    </div>
                    <p class=\"text-white\">Join our community of camping enthusiasts and get exclusive access to premium camping spots. Register now and enjoy special discounts on your first booking!</p>
                    <ul class=\"list-inline text-white m-0\">
                        <li class=\"py-2\"><i class=\"fa fa-check text-primary mr-3\"></i>Access to exclusive camping spots</li>
                        <li class=\"py-2\"><i class=\"fa fa-check text-primary mr-3\"></i>Special discounts and offers</li>
                        <li class=\"py-2\"><i class=\"fa fa-check text-primary mr-3\"></i>Connect with other camping enthusiasts</li>
                    </ul>
                </div>
                <div class=\"col-lg-5\">
                    <div class=\"card border-0\">
                        <div class=\"card-header bg-primary text-center p-4\">
                            <h1 class=\"text-white m-0\">Sign Up Now</h1>
                        </div>
                        <div class=\"card-body rounded-bottom bg-white p-5\">
                            <form>
                                <div class=\"form-group\">
                                    <input type=\"text\" class=\"form-control p-4\" placeholder=\"Your name\" required=\"required\" />
                                </div>
                                <div class=\"form-group\">
                                    <input type=\"email\" class=\"form-control p-4\" placeholder=\"Your email\" required=\"required\" />
                                </div>
                                <div class=\"form-group\">
                                    <input type=\"password\" class=\"form-control p-4\" placeholder=\"Your password\" required=\"required\" />
                                </div>
                                <div>
                                    <button class=\"btn btn-primary btn-block py-3\" type=\"submit\">Sign Up Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

    <!-- Team Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container pt-5 pb-3\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Guides</h6>
                <h1>Our Travel Guides</h1>
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
                            <p class=\"m-0\">Mountain Expert</p>
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
                            <p class=\"m-0\">Forest Guide</p>
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
                            <p class=\"m-0\">Lakeside Expert</p>
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
                            <p class=\"m-0\">Desert Guide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class=\"container-fluid py-5\">
        <div class=\"container py-5\">
            <div class=\"text-center mb-3 pb-3\">
                <h6 class=\"text-primary text-uppercase\" style=\"letter-spacing: 5px;\">Testimonial</h6>
                <h1>What Say Our Clients</h1>
            </div>
            <div class=\"owl-carousel testimonial-carousel\">
                <div class=\"text-center pb-4\">
                    <img class=\"img-fluid mx-auto\" src=\"{{ asset('img/testimonial-1.jpg') }}\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">CampConnect helped me find the perfect camping spot for my family vacation. The booking process was seamless, and the campsite exceeded our expectations!
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class=\"text-center\">
                    <img class=\"img-fluid mx-auto\" src=\"{{ asset('img/testimonial-2.jpg') }}\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">I've been using CampConnect for all my camping adventures. The reviews and ratings are accurate, and I love discovering new camping spots through this platform.
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class=\"text-center\">
                    <img class=\"img-fluid mx-auto\" src=\"{{ asset('img/testimonial-3.jpg') }}\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">As a camping enthusiast, I highly recommend CampConnect. The detailed descriptions and photos of each camping spot make it easy to choose the right place for your adventure.
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
                <div class=\"text-center\">
                    <img class=\"img-fluid mx-auto\" src=\"{{ asset('img/testimonial-4.jpg') }}\" style=\"width: 100px; height: 100px;\">
                    <div class=\"testimonial-text bg-white p-4 mt-n5\">
                        <p class=\"mt-5\">CampConnect has transformed the way I plan my camping trips. The user-friendly interface and helpful community make it a must-have resource for any outdoor enthusiast.
                        </p>
                        <h5 class=\"text-truncate\">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
{% endblock %}
", "home/index.html.twig", "/home/elbog/Documents/3eme_pi/CampConnect_web/templates/home/index.html.twig");
    }
}
