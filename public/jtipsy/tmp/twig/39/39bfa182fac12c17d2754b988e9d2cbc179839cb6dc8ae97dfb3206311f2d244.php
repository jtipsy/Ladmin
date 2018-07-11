<?php

/* columns_definitions/transformation_option.twig */
class __TwigTemplate_2dfe9ad3e9a169baefa9a453e0739846c2f5aa030b00cbf449e658404c13af19 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["options_key"] = (($context["type_prefix"] ?? null) . "transformation_options");
        // line 2
        echo "<input id=\"field_";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    type=\"text\"
    name=\"field_";
        // line 4
        echo twig_escape_filter($this->env, ($context["options_key"] ?? null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    size=\"16\"
    class=\"textfield\"
    value=\"";
        // line 7
        if (($this->getAttribute(($context["column_meta"] ?? null), "Field", array(), "array", true, true) && $this->getAttribute($this->getAttribute(($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", array(), "array"), array(), "array", false, true), ($context["options_key"] ?? null), array(), "array", true, true))) {
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", array(), "array"), array(), "array"), ($context["options_key"] ?? null), array(), "array"), "html", null, true);
        }
        // line 9
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/transformation_option.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  39 => 8,  37 => 7,  29 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/transformation_option.twig", "/data/www/Ladmin/public/jtipsy/templates/columns_definitions/transformation_option.twig");
    }
}
