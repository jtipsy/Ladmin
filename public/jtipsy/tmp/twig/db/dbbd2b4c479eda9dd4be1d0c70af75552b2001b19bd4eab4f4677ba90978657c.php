<?php

/* columns_definitions/mime_type.twig */
class __TwigTemplate_9ce5d1986340d4c99e0e345d3f29510de3e9c689fb7f09f17c509f6c975b3c3a extends Twig_Template
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
        echo "<select id=\"field_";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    size=\"1\"
    name=\"field_mimetype[";
        // line 3
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\">
    <option value=\"\">&nbsp;</option>
    ";
        // line 5
        if (($this->getAttribute(($context["available_mime"] ?? null), "mimetype", array(), "array", true, true) && twig_test_iterable($this->getAttribute(        // line 6
($context["available_mime"] ?? null), "mimetype", array(), "array")))) {
            // line 7
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["available_mime"] ?? null), "mimetype", array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["mimetype"]) {
                // line 8
                echo "            ";
                $context["checked"] = (((($this->getAttribute(($context["column_meta"] ?? null), "Field", array(), "array", true, true) && $this->getAttribute($this->getAttribute(                // line 9
($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", array(), "array"), array(), "array", false, true), "mimetype", array(), "array", true, true)) && ($this->getAttribute($this->getAttribute(                // line 10
($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", array(), "array"), array(), "array"), "mimetype", array(), "array") == twig_replace_filter($context["mimetype"], array("/" => "_"))))) ? (" selected") : (""));
                // line 12
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, twig_replace_filter($context["mimetype"], array("/" => "_")), "html", null, true);
                echo "\"";
                echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
                echo ">
                ";
                // line 13
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["mimetype"]), "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mimetype'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "    ";
        }
        // line 17
        echo "</select>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/mime_type.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 17,  61 => 16,  52 => 13,  45 => 12,  43 => 10,  42 => 9,  40 => 8,  35 => 7,  33 => 6,  32 => 5,  27 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/mime_type.twig", "/data/www/Ladmin/public/jtipsy/templates/columns_definitions/mime_type.twig");
    }
}
