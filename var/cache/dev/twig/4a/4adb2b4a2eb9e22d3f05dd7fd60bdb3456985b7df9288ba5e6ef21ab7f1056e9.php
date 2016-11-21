<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_97f2198672b3216c912e92c10a07089bf41063b7b39e444f85a98911ab93da98 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b1dbe365717e8729fc194490dac47558bd64bf1263d59cc2bd624a56c5eb6671 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b1dbe365717e8729fc194490dac47558bd64bf1263d59cc2bd624a56c5eb6671->enter($__internal_b1dbe365717e8729fc194490dac47558bd64bf1263d59cc2bd624a56c5eb6671_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b1dbe365717e8729fc194490dac47558bd64bf1263d59cc2bd624a56c5eb6671->leave($__internal_b1dbe365717e8729fc194490dac47558bd64bf1263d59cc2bd624a56c5eb6671_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_adfdf7a27edf15a547f3b97d809c031fc1930e92c5b81342fa66eab213d6458c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_adfdf7a27edf15a547f3b97d809c031fc1930e92c5b81342fa66eab213d6458c->enter($__internal_adfdf7a27edf15a547f3b97d809c031fc1930e92c5b81342fa66eab213d6458c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_adfdf7a27edf15a547f3b97d809c031fc1930e92c5b81342fa66eab213d6458c->leave($__internal_adfdf7a27edf15a547f3b97d809c031fc1930e92c5b81342fa66eab213d6458c_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_a3d0d15a01035d886a54539e4cb28add426c428a5d6c31c292e6d440d98bff80 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a3d0d15a01035d886a54539e4cb28add426c428a5d6c31c292e6d440d98bff80->enter($__internal_a3d0d15a01035d886a54539e4cb28add426c428a5d6c31c292e6d440d98bff80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_a3d0d15a01035d886a54539e4cb28add426c428a5d6c31c292e6d440d98bff80->leave($__internal_a3d0d15a01035d886a54539e4cb28add426c428a5d6c31c292e6d440d98bff80_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_60b73775cafcd1fccd214e56cc6bac841317588dad50fad1dd359d7586ee9b97 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_60b73775cafcd1fccd214e56cc6bac841317588dad50fad1dd359d7586ee9b97->enter($__internal_60b73775cafcd1fccd214e56cc6bac841317588dad50fad1dd359d7586ee9b97_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_60b73775cafcd1fccd214e56cc6bac841317588dad50fad1dd359d7586ee9b97->leave($__internal_60b73775cafcd1fccd214e56cc6bac841317588dad50fad1dd359d7586ee9b97_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\Users\\florian.minin\\Documents\\Prive\\Projet\\Talented\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\router.html.twig");
    }
}
