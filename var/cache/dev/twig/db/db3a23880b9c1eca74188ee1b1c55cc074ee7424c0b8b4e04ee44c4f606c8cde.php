<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_e9fe1ca2ab90c1530d0a834302cf64b8df720d1f6c76a53396d36ee65c7eb9ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9b337b70529bf27ebf8c28a10d5b7d1b9406b6cbdcc2948127b52111935ab24f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9b337b70529bf27ebf8c28a10d5b7d1b9406b6cbdcc2948127b52111935ab24f->enter($__internal_9b337b70529bf27ebf8c28a10d5b7d1b9406b6cbdcc2948127b52111935ab24f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9b337b70529bf27ebf8c28a10d5b7d1b9406b6cbdcc2948127b52111935ab24f->leave($__internal_9b337b70529bf27ebf8c28a10d5b7d1b9406b6cbdcc2948127b52111935ab24f_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_da1396d474d1eabcd0cf2e345aa14e55f6c49153d01153d12e92244246f68c7b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_da1396d474d1eabcd0cf2e345aa14e55f6c49153d01153d12e92244246f68c7b->enter($__internal_da1396d474d1eabcd0cf2e345aa14e55f6c49153d01153d12e92244246f68c7b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_da1396d474d1eabcd0cf2e345aa14e55f6c49153d01153d12e92244246f68c7b->leave($__internal_da1396d474d1eabcd0cf2e345aa14e55f6c49153d01153d12e92244246f68c7b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_89e18a3b0243619f667fb8ec244043910daa50251984b49998aa2844ce059fac = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_89e18a3b0243619f667fb8ec244043910daa50251984b49998aa2844ce059fac->enter($__internal_89e18a3b0243619f667fb8ec244043910daa50251984b49998aa2844ce059fac_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_89e18a3b0243619f667fb8ec244043910daa50251984b49998aa2844ce059fac->leave($__internal_89e18a3b0243619f667fb8ec244043910daa50251984b49998aa2844ce059fac_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_3ab2af7ad88c37bde44fb49ffa21d450ad40cb64ced085e533ad180dce567468 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3ab2af7ad88c37bde44fb49ffa21d450ad40cb64ced085e533ad180dce567468->enter($__internal_3ab2af7ad88c37bde44fb49ffa21d450ad40cb64ced085e533ad180dce567468_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_3ab2af7ad88c37bde44fb49ffa21d450ad40cb64ced085e533ad180dce567468->leave($__internal_3ab2af7ad88c37bde44fb49ffa21d450ad40cb64ced085e533ad180dce567468_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "C:\\Users\\florian.minin\\Documents\\Prive\\Projet\\Talented\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\TwigBundle\\Resources\\views\\Exception\\exception_full.html.twig");
    }
}
