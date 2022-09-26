<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/restaurant_lite/templates/page.html.twig */
class __TwigTemplate_1baed18b9d26adad1f15775abd8df3f3f3669742856cd96cf616b4b8407ecf39 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 77
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slideout", [], "any", false, false, true, 77)) {
            // line 78
            echo "  ";
            // line 79
            echo "  <div class=\"clearfix slideout ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slideout_background_color"] ?? null), 79, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["slideout_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["slideout_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
    ";
            // line 81
            echo "    <div class=\"clearfix slideout__container\">
      <div class=\"slideout__section\">
        ";
            // line 83
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slideout", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
            echo "
      </div>
    </div>
    ";
            // line 87
            echo "  </div>
  ";
            // line 89
            echo "
  ";
            // line 91
            echo "  <button class=\"slideout-toggle slideout-toggle--fixed\"><i class=\"fa fa-align-justify\"></i></button>
  ";
        }
        // line 94
        echo "
";
        // line 96
        echo "<div class=\"page-container\">

  ";
        // line 98
        if (((((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_first", [], "any", false, false, true, 98) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_second", [], "any", false, false, true, 98)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 98)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 98)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_third", [], "any", false, false, true, 98)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_first", [], "any", false, false, true, 98)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_second", [], "any", false, false, true, 98))) {
            // line 99
            echo "    ";
            // line 100
            echo "    <div class=\"header-container\">

      ";
            // line 102
            if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_first", [], "any", false, false, true, 102) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_second", [], "any", false, false, true, 102))) {
                // line 103
                echo "        ";
                // line 104
                echo "        <div class=\"clearfix header-top-highlighted ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_highlighted_background_color"] ?? null), 104, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["header_top_highlighted_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["header_top_highlighted_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
                echo "\">
          <div class=\"";
                // line 105
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_highlighted_layout_container"] ?? null), 105, $this->source), "html", null, true);
                echo "\">
            ";
                // line 107
                echo "            <div class=\"clearfix header-top-highlighted__container";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["header_top_highlighted_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
              ";
                // line 108
                if ((($context["header_top_highlighted_animations"] ?? null) == "enabled")) {
                    // line 109
                    echo "                data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_highlighted_animation_effect"] ?? null), 109, $this->source), "html", null, true);
                    echo "\"
              ";
                }
                // line 110
                echo ">
              <div class=\"row\">
                ";
                // line 112
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_first", [], "any", false, false, true, 112)) {
                    // line 113
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_highlighted_first_grid_class"] ?? null), 113, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 115
                    echo "                    <div class=\"clearfix header-top-highlighted__section header-top-highlighted-first\">
                      ";
                    // line 116
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_first", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 119
                    echo "                  </div>
                ";
                }
                // line 121
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_second", [], "any", false, false, true, 121)) {
                    // line 122
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_highlighted_second_grid_class"] ?? null), 122, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 124
                    echo "                    <div class=\"clearfix header-top-highlighted__section header-top-highlighted-second\">
                      ";
                    // line 125
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_highlighted_second", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 128
                    echo "                  </div>
                ";
                }
                // line 130
                echo "              </div>
            </div>
            ";
                // line 133
                echo "          </div>
        </div>
        ";
                // line 136
                echo "      ";
            }
            // line 137
            echo "
      ";
            // line 138
            if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_first", [], "any", false, false, true, 138) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_second", [], "any", false, false, true, 138))) {
                // line 139
                echo "        ";
                // line 140
                echo "        <div class=\"clearfix header-top ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_background_color"] ?? null), 140, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["header_top_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["header_top_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
                echo "\">
          <div class=\"";
                // line 141
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_layout_container"] ?? null), 141, $this->source), "html", null, true);
                echo "\">
            ";
                // line 143
                echo "            <div class=\"clearfix header-top__container";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["header_top_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
              ";
                // line 144
                if ((($context["header_top_animations"] ?? null) == "enabled")) {
                    // line 145
                    echo "                data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_animation_effect"] ?? null), 145, $this->source), "html", null, true);
                    echo "\"
              ";
                }
                // line 146
                echo ">
              <div class=\"row\">
                ";
                // line 148
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_first", [], "any", false, false, true, 148)) {
                    // line 149
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_first_grid_class"] ?? null), 149, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 151
                    echo "                    <div class=\"clearfix header-top__section header-top-first\">
                      ";
                    // line 152
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_first", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 155
                    echo "                  </div>
                ";
                }
                // line 157
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_second", [], "any", false, false, true, 157)) {
                    // line 158
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_top_second_grid_class"] ?? null), 158, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 160
                    echo "                    <div class=\"clearfix header-top__section header-top-second\">
                      ";
                    // line 161
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_top_second", [], "any", false, false, true, 161), 161, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 164
                    echo "                  </div>
                ";
                }
                // line 166
                echo "              </div>
            </div>
            ";
                // line 169
                echo "          </div>
        </div>
        ";
                // line 172
                echo "      ";
            }
            // line 173
            echo "
      ";
            // line 174
            if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 174) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 174)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_third", [], "any", false, false, true, 174))) {
                // line 175
                echo "        ";
                // line 176
                echo "        <header role=\"banner\" class=\"clearfix header ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_background_color"] ?? null), 176, $this->source), "html", null, true);
                echo " ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_layout_container_class"] ?? null), 176, $this->source), "html", null, true);
                echo " ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_layout_columns_class"] ?? null), 176, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["header_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["header_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
                echo "\">
          <div class=\"";
                // line 177
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_layout_container"] ?? null), 177, $this->source), "html", null, true);
                echo "\">
            ";
                // line 179
                echo "            <div class=\"clearfix header__container\">
              <div class=\"row\">
                ";
                // line 181
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 181)) {
                    // line 182
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_first_grid_class"] ?? null), 182, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 184
                    echo "                    <div class=\"clearfix header__section header-first\">
                      ";
                    // line 185
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_first", [], "any", false, false, true, 185), 185, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 188
                    echo "                  </div>
                ";
                }
                // line 190
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_third", [], "any", false, false, true, 190)) {
                    // line 191
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_third_grid_class"] ?? null), 191, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 193
                    echo "                    <div class=\"clearfix header__section header-third\">
                      ";
                    // line 194
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_third", [], "any", false, false, true, 194), 194, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 197
                    echo "                  </div>
                ";
                }
                // line 199
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 199)) {
                    // line 200
                    echo "                  <div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_second_grid_class"] ?? null), 200, $this->source), "html", null, true);
                    echo "\">
                    ";
                    // line 202
                    echo "                    <div class=\"clearfix header__section header-second\">
                      ";
                    // line 203
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 203), 203, $this->source), "html", null, true);
                    echo "
                    </div>
                    ";
                    // line 206
                    echo "                  </div>
                ";
                }
                // line 208
                echo "              </div>
            </div>
            ";
                // line 211
                echo "          </div>
          ";
                // line 212
                if ((($context["post_progress_status"] ?? null) == "enabled")) {
                    // line 213
                    echo "            ";
                    // line 214
                    echo "            <div class=\"post-progress\">
              <div class=\"post-progress__bar\"></div>
            </div>
            ";
                    // line 218
                    echo "          ";
                }
                // line 219
                echo "        </header>
        ";
                // line 221
                echo "      ";
            }
            // line 222
            echo "
    </div>
    ";
            // line 225
            echo "  ";
        }
        // line 226
        echo "
  ";
        // line 227
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 227)) {
            // line 228
            echo "    ";
            // line 229
            echo "    <div class=\"clearfix banner ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["banner_background_color"] ?? null), 229, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["banner_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["banner_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 230
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["banner_layout_container"] ?? null), 230, $this->source), "html", null, true);
            echo "\">
        ";
            // line 232
            echo "        <div class=\"clearfix banner__container\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"banner__section\">
                ";
            // line 236
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 236), 236, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 242
            echo "      </div>
    </div>
    ";
            // line 245
            echo "  ";
        }
        // line 246
        echo "
  ";
        // line 247
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 247)) {
            // line 248
            echo "    ";
            // line 249
            echo "    <div class=\"clearfix content-top ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_background_color"] ?? null), 249, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_separator"] ?? null), 249, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["content_top_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["content_top_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 250
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_layout_container"] ?? null), 250, $this->source), "html", null, true);
            echo "\">
        ";
            // line 252
            echo "        <div class=\"clearfix content-top__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["content_top_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 253
            if ((($context["content_top_animations"] ?? null) == "enabled")) {
                // line 254
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_animation_effect"] ?? null), 254, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 255
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"content-top__section\">
                ";
            // line 259
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 259), 259, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 265
            echo "      </div>
    </div>
    ";
            // line 268
            echo "  ";
        }
        // line 269
        echo "
  ";
        // line 270
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top_highlighted", [], "any", false, false, true, 270)) {
            // line 271
            echo "    ";
            // line 272
            echo "    <div class=\"clearfix content-top-highlighted ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_highlighted_background_color"] ?? null), 272, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_highlighted_separator"] ?? null), 272, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["content_top_highlighted_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["content_top_highlighted_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 273
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_highlighted_layout_container"] ?? null), 273, $this->source), "html", null, true);
            echo "\">
        ";
            // line 275
            echo "        <div class=\"clearfix content-top-highlighted__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["content_top_highlighted_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 276
            if ((($context["content_top_highlighted_animations"] ?? null) == "enabled")) {
                // line 277
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_top_highlighted_animation_effect"] ?? null), 277, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 278
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"content-top-highlighted__section\">
                ";
            // line 282
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top_highlighted", [], "any", false, false, true, 282), 282, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 288
            echo "      </div>
    </div>
    ";
            // line 291
            echo "  ";
        }
        // line 292
        echo "
  ";
        // line 294
        echo "  <div class=\"clearfix main-content region--dark-typography region--white-background  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["main_content_separator"] ?? null), 294, $this->source), "html", null, true);
        echo "\">

    ";
        // line 296
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "system_messages", [], "any", false, false, true, 296)) {
            // line 297
            echo "      ";
            // line 298
            echo "      <div class=\"system-messages clearfix\">
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              ";
            // line 302
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "system_messages", [], "any", false, false, true, 302), 302, $this->source), "html", null, true);
            echo "
            </div>
          </div>
        </div>
      </div>
      ";
            // line 308
            echo "    ";
        }
        // line 309
        echo "
    <div class=\"container\">
      <div class=\"clearfix main-content__container\">
        <div class=\"row\">
          <section class=\"";
        // line 313
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["main_grid_class"] ?? null), 313, $this->source), "html", null, true);
        echo "\">
            ";
        // line 315
        echo "            <div class=\"clearfix main-content__section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["main_content_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["main_content_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["main_content_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
        echo "\"
              ";
        // line 316
        if ((($context["main_content_animations"] ?? null) == "enabled")) {
            // line 317
            echo "                data-animate-effect=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["main_content_animation_effect"] ?? null), 317, $this->source), "html", null, true);
            echo "\"
              ";
        }
        // line 318
        echo ">
              ";
        // line 319
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 319)) {
            // line 320
            echo "                ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 320), 320, $this->source), "html", null, true);
            echo "
              ";
        }
        // line 322
        echo "            </div>
            ";
        // line 324
        echo "          </section>
          ";
        // line 325
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 325)) {
            // line 326
            echo "            <aside class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_grid_class"] ?? null), 326, $this->source), "html", null, true);
            echo "\">
              ";
            // line 328
            echo "              <section class=\"sidebar__section sidebar-first clearfix";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["sidebar_first_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["sidebar_first_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["sidebar_first_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\"
                ";
            // line 329
            if ((($context["sidebar_first_animations"] ?? null) == "enabled")) {
                // line 330
                echo "                  data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_animation_effect"] ?? null), 330, $this->source), "html", null, true);
                echo "\"
                ";
            }
            // line 331
            echo ">
                ";
            // line 332
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 332), 332, $this->source), "html", null, true);
            echo "
              </section>
              ";
            // line 335
            echo "            </aside>
          ";
        }
        // line 337
        echo "          ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 337)) {
            // line 338
            echo "            <aside class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_grid_class"] ?? null), 338, $this->source), "html", null, true);
            echo "\">
              ";
            // line 340
            echo "              <section class=\"sidebar__section sidebar-second clearfix";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["sidebar_second_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["sidebar_second_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["sidebar_second_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\"
                ";
            // line 341
            if ((($context["sidebar_second_animations"] ?? null) == "enabled")) {
                // line 342
                echo "                  data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_animation_effect"] ?? null), 342, $this->source), "html", null, true);
                echo "\"
                ";
            }
            // line 343
            echo ">
                ";
            // line 344
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 344), 344, $this->source), "html", null, true);
            echo "
              </section>
              ";
            // line 347
            echo "            </aside>
          ";
        }
        // line 349
        echo "        </div>
      </div>
    </div>
  </div>
  ";
        // line 354
        echo "
  ";
        // line 355
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_first", [], "any", false, false, true, 355) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_second", [], "any", false, false, true, 355))) {
            // line 356
            echo "    ";
            // line 357
            echo "    <div class=\"clearfix content-bottom ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_bottom_background_color"] ?? null), 357, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_bottom_separator"] ?? null), 357, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["content_bottom_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["content_bottom_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 358
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_bottom_layout_container"] ?? null), 358, $this->source), "html", null, true);
            echo "\">
        ";
            // line 360
            echo "        <div class=\"clearfix content-bottom__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["content_bottom_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 361
            if ((($context["content_bottom_animations"] ?? null) == "enabled")) {
                // line 362
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_bottom_animation_effect"] ?? null), 362, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 363
            echo ">
          <div class=\"row\">
            ";
            // line 365
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_first", [], "any", false, false, true, 365)) {
                // line 366
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_bottom_first_grid_class"] ?? null), 366, $this->source), "html", null, true);
                echo "\">
                ";
                // line 368
                echo "                <div class=\"clearfix content-bottom__section content-bottom-first\">
                  ";
                // line 369
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_first", [], "any", false, false, true, 369), 369, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 372
                echo "              </div>
            ";
            }
            // line 374
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_second", [], "any", false, false, true, 374)) {
                // line 375
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_bottom_second_grid_class"] ?? null), 375, $this->source), "html", null, true);
                echo "\">
                ";
                // line 377
                echo "                <div class=\"clearfix content-bottom__section content-bottom-second\">
                  ";
                // line 378
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_second", [], "any", false, false, true, 378), 378, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 381
                echo "              </div>
            ";
            }
            // line 383
            echo "          </div>
        </div>
        ";
            // line 386
            echo "      </div>
    </div>
    ";
            // line 389
            echo "  ";
        }
        // line 390
        echo "
  ";
        // line 391
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 391)) {
            // line 392
            echo "    ";
            // line 393
            echo "    <div class=\"clearfix featured-top ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_top_background_color"] ?? null), 393, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_top_separator"] ?? null), 393, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["featured_top_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["featured_top_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 394
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_top_layout_container"] ?? null), 394, $this->source), "html", null, true);
            echo "\">
        ";
            // line 396
            echo "        <div class=\"clearfix featured-top__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["featured_top_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 397
            if ((($context["featured_top_animations"] ?? null) == "enabled")) {
                // line 398
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_top_animation_effect"] ?? null), 398, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 399
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"clearfix featured-top__section\">
                ";
            // line 403
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_top", [], "any", false, false, true, 403), 403, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 409
            echo "      </div>
    </div>
    ";
            // line 412
            echo "  ";
        }
        // line 413
        echo "
  ";
        // line 414
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured", [], "any", false, false, true, 414)) {
            // line 415
            echo "    ";
            // line 416
            echo "    <div class=\"clearfix featured ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_background_color"] ?? null), 416, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_separator"] ?? null), 416, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["featured_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["featured_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 417
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_layout_container"] ?? null), 417, $this->source), "html", null, true);
            echo "\">
        ";
            // line 419
            echo "        <div class=\"clearfix featured__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["featured_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 420
            if ((($context["featured_animations"] ?? null) == "enabled")) {
                // line 421
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_animation_effect"] ?? null), 421, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 422
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"clearfix featured__section\">
                ";
            // line 426
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured", [], "any", false, false, true, 426), 426, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 432
            echo "      </div>
    </div>
    ";
            // line 435
            echo "  ";
        }
        // line 436
        echo "
  ";
        // line 437
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom", [], "any", false, false, true, 437)) {
            // line 438
            echo "    ";
            // line 439
            echo "    <div class=\"clearfix featured-bottom ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_bottom_background_color"] ?? null), 439, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_bottom_separator"] ?? null), 439, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["featured_bottom_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["featured_bottom_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 440
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_bottom_layout_container"] ?? null), 440, $this->source), "html", null, true);
            echo "\">
        ";
            // line 442
            echo "        <div class=\"clearfix featured-bottom__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["featured_bottom_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 443
            if ((($context["featured_bottom_animations"] ?? null) == "enabled")) {
                // line 444
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["featured_bottom_animation_effect"] ?? null), 444, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 445
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"clearfix featured-bottom__section\">
                ";
            // line 449
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "featured_bottom", [], "any", false, false, true, 449), 449, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 455
            echo "      </div>
    </div>
    ";
            // line 458
            echo "  ";
        }
        // line 459
        echo "
  ";
        // line 460
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_featured", [], "any", false, false, true, 460)) {
            // line 461
            echo "    ";
            // line 462
            echo "    <div class=\"clearfix sub-featured ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_featured_background_color"] ?? null), 462, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_featured_separator"] ?? null), 462, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["sub_featured_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["sub_featured_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 463
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_featured_layout_container"] ?? null), 463, $this->source), "html", null, true);
            echo "\">
        ";
            // line 465
            echo "        <div class=\"clearfix sub-featured__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["sub_featured_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 466
            if ((($context["sub_featured_animations"] ?? null) == "enabled")) {
                // line 467
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sub_featured_animation_effect"] ?? null), 467, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 468
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"clearfix sub-featured__section\">
                ";
            // line 472
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_featured", [], "any", false, false, true, 472), 472, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 478
            echo "      </div>
    </div>
    ";
            // line 481
            echo "  ";
        }
        // line 482
        echo "
  ";
        // line 483
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_top", [], "any", false, false, true, 483)) {
            // line 484
            echo "    ";
            // line 485
            echo "    <div class=\"clearfix highlighted-top ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_top_background_color"] ?? null), 485, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_top_separator"] ?? null), 485, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["highlighted_top_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["highlighted_top_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 486
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_top_layout_container"] ?? null), 486, $this->source), "html", null, true);
            echo "\">
        ";
            // line 488
            echo "        <div class=\"clearfix highlighted-top__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["highlighted_top_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 489
            if ((($context["highlighted_top_animations"] ?? null) == "enabled")) {
                // line 490
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_top_animation_effect"] ?? null), 490, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 491
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"clearfix highlighted-top__section\">
                ";
            // line 495
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_top", [], "any", false, false, true, 495), 495, $this->source), "html", null, true);
            echo "
              </div>
            </div>
          </div>
        </div>
        ";
            // line 501
            echo "      </div>
    </div>
    ";
            // line 504
            echo "  ";
        }
        // line 505
        echo "
  ";
        // line 506
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_first", [], "any", false, false, true, 506) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_second", [], "any", false, false, true, 506))) {
            // line 507
            echo "    ";
            // line 508
            echo "    <div class=\"clearfix highlighted ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_regions"] ?? null), 508, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_background_color"] ?? null), 508, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_separator"] ?? null), 508, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["highlighted_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["highlighted_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 509
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_layout_container"] ?? null), 509, $this->source), "html", null, true);
            echo "\">
        ";
            // line 511
            echo "        <div class=\"clearfix highlighted__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["highlighted_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 512
            if ((($context["highlighted_animations"] ?? null) == "enabled")) {
                // line 513
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_animation_effect"] ?? null), 513, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 514
            echo ">
          <div class=\"row\">
            ";
            // line 516
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_first", [], "any", false, false, true, 516)) {
                // line 517
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_first_grid_class"] ?? null), 517, $this->source), "html", null, true);
                echo "\">
                ";
                // line 519
                echo "                <div class=\"clearfix highlighted__section highlighted-first\">
                  ";
                // line 520
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_first", [], "any", false, false, true, 520), 520, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 523
                echo "              </div>
            ";
            }
            // line 525
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_second", [], "any", false, false, true, 525)) {
                // line 526
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["highlighted_second_grid_class"] ?? null), 526, $this->source), "html", null, true);
                echo "\">
                ";
                // line 528
                echo "                <div class=\"clearfix highlighted__section highlighted-second\">
                  ";
                // line 529
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted_second", [], "any", false, false, true, 529), 529, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 532
                echo "              </div>
            ";
            }
            // line 534
            echo "          </div>
        </div>
        ";
            // line 537
            echo "      </div>
    </div>
    ";
            // line 540
            echo "  ";
        }
        // line 541
        echo "
  ";
        // line 542
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top_first", [], "any", false, false, true, 542) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top_second", [], "any", false, false, true, 542))) {
            // line 543
            echo "    ";
            // line 544
            echo "    <div class=\"clearfix footer-top ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_regions"] ?? null), 544, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_background_color"] ?? null), 544, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_separator"] ?? null), 544, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["footer_top_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["footer_top_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 545
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_layout_container"] ?? null), 545, $this->source), "html", null, true);
            echo "\">
        ";
            // line 547
            echo "        <div class=\"clearfix footer-top__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_top_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 548
            if ((($context["footer_top_animations"] ?? null) == "enabled")) {
                // line 549
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_animation_effect"] ?? null), 549, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 550
            echo ">
          <div class=\"row\">
            ";
            // line 552
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top_first", [], "any", false, false, true, 552)) {
                // line 553
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_first_grid_class"] ?? null), 553, $this->source), "html", null, true);
                echo "\">
                ";
                // line 555
                echo "                <div class=\"clearfix footer-top__section footer-top-first\">
                  ";
                // line 556
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top_first", [], "any", false, false, true, 556), 556, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 559
                echo "              </div>
            ";
            }
            // line 561
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top_second", [], "any", false, false, true, 561)) {
                // line 562
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_top_second_grid_class"] ?? null), 562, $this->source), "html", null, true);
                echo "\">
                ";
                // line 564
                echo "                <div class=\"clearfix footer-top__section footer-top-second\">
                  ";
                // line 565
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top_second", [], "any", false, false, true, 565), 565, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 568
                echo "              </div>
            ";
            }
            // line 570
            echo "          </div>
        </div>
        ";
            // line 573
            echo "      </div>
    </div>
    ";
            // line 576
            echo "  ";
        }
        // line 577
        echo "
  ";
        // line 578
        if (((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 578) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 578)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 578)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 578)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 578))) {
            // line 579
            echo "    ";
            // line 580
            echo "    <footer class=\"clearfix footer ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_background_color"] ?? null), 580, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_separator"] ?? null), 580, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["footer_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["footer_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 581
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_layout_container"] ?? null), 581, $this->source), "html", null, true);
            echo "\">
        <div class=\"clearfix footer__container\">
          <div class=\"row\">
            ";
            // line 584
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 584)) {
                // line 585
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_first_grid_class"] ?? null), 585, $this->source), "html", null, true);
                echo "\">
                ";
                // line 587
                echo "                <div class=\"clearfix footer__section footer-first";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
                  ";
                // line 588
                if ((($context["footer_animations"] ?? null) == "enabled")) {
                    // line 589
                    echo "                    data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_animation_effect"] ?? null), 589, $this->source), "html", null, true);
                    echo "\"
                  ";
                }
                // line 590
                echo ">
                  ";
                // line 591
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 591), 591, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 594
                echo "              </div>
            ";
            }
            // line 596
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 596)) {
                // line 597
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_second_grid_class"] ?? null), 597, $this->source), "html", null, true);
                echo "\">
                ";
                // line 599
                echo "                <div class=\"clearfix footer__section footer-second";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
                  ";
                // line 600
                if ((($context["footer_animations"] ?? null) == "enabled")) {
                    // line 601
                    echo "                    data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_animation_effect"] ?? null), 601, $this->source), "html", null, true);
                    echo "\"
                  ";
                }
                // line 602
                echo ">
                  ";
                // line 603
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 603), 603, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 606
                echo "              </div>
            ";
            }
            // line 608
            echo "            <div class=\"clearfix ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_4_columns_clearfix_first"] ?? null), 608, $this->source), "html", null, true);
            echo "\"></div>
            ";
            // line 609
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 609)) {
                // line 610
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_third_grid_class"] ?? null), 610, $this->source), "html", null, true);
                echo "\">
                ";
                // line 612
                echo "                <div class=\"clearfix footer__section footer-third";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
                  ";
                // line 613
                if ((($context["footer_animations"] ?? null) == "enabled")) {
                    // line 614
                    echo "                    data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_animation_effect"] ?? null), 614, $this->source), "html", null, true);
                    echo "\"
                  ";
                }
                // line 615
                echo ">
                  ";
                // line 616
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 616), 616, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 619
                echo "              </div>
            ";
            }
            // line 621
            echo "            <div class=\"clearfix ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_4_columns_clearfix_second"] ?? null), 621, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_5_columns_clearfix"] ?? null), 621, $this->source), "html", null, true);
            echo "\"></div>
            ";
            // line 622
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 622)) {
                // line 623
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_fourth_grid_class"] ?? null), 623, $this->source), "html", null, true);
                echo "\">
                ";
                // line 625
                echo "                <div class=\"clearfix footer__section footer-fourth";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
                  ";
                // line 626
                if ((($context["footer_animations"] ?? null) == "enabled")) {
                    // line 627
                    echo "                    data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_animation_effect"] ?? null), 627, $this->source), "html", null, true);
                    echo "\"
                  ";
                }
                // line 628
                echo ">
                  ";
                // line 629
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 629), 629, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 632
                echo "              </div>
            ";
            }
            // line 634
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 634)) {
                // line 635
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_fifth_grid_class"] ?? null), 635, $this->source), "html", null, true);
                echo "\">
                ";
                // line 637
                echo "                <div class=\"clearfix footer__section footer-fifth";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
                echo "\"
                  ";
                // line 638
                if ((($context["footer_animations"] ?? null) == "enabled")) {
                    // line 639
                    echo "                    data-animate-effect=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_animation_effect"] ?? null), 639, $this->source), "html", null, true);
                    echo "\"
                  ";
                }
                // line 640
                echo ">
                  ";
                // line 641
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fifth", [], "any", false, false, true, 641), 641, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 644
                echo "              </div>
            ";
            }
            // line 646
            echo "          </div>
        </div>
      </div>
    </footer>
    ";
            // line 651
            echo "  ";
        }
        // line 652
        echo "
  ";
        // line 653
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 653)) {
            // line 654
            echo "    ";
            // line 655
            echo "    <div class=\"clearfix footer-bottom ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_bottom_background_color"] ?? null), 655, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_bottom_separator"] ?? null), 655, $this->source), "html", null, true);
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["footer_bottom_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["footer_bottom_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 656
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_bottom_layout_container"] ?? null), 656, $this->source), "html", null, true);
            echo "\">
        ";
            // line 658
            echo "        <div class=\"clearfix footer-bottom__container";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["footer_bottom_animations"] ?? null) == "enabled")) ? (" mt-no-opacity") : ("")));
            echo "\"
          ";
            // line 659
            if ((($context["footer_bottom_animations"] ?? null) == "enabled")) {
                // line 660
                echo "            data-animate-effect=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_bottom_animation_effect"] ?? null), 660, $this->source), "html", null, true);
                echo "\"
          ";
            }
            // line 661
            echo ">
          <div class=\"row\">
            <div class=\"col-md-12\">
              ";
            // line 665
            echo "              <div class=\"clearfix footer-bottom__section footer-bottom\">
                ";
            // line 666
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 666), 666, $this->source), "html", null, true);
            echo "
              </div>
              ";
            // line 669
            echo "            </div>
          </div>
        </div>
        ";
            // line 673
            echo "      </div>
    </div>
    ";
            // line 676
            echo "  ";
        }
        // line 677
        echo "
  ";
        // line 678
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_first", [], "any", false, false, true, 678) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_second", [], "any", false, false, true, 678)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_third", [], "any", false, false, true, 678))) {
            // line 679
            echo "    ";
            // line 680
            echo "    <div class=\"clearfix subfooter-top ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_top_background_color"] ?? null), 680, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_top_separator"] ?? null), 680, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["subfooter_top_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["subfooter_top_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 681
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_top_layout_container"] ?? null), 681, $this->source), "html", null, true);
            echo "\">
        <div class=\"clearfix subfooter-top__container\">
          <div class=\"row\">
            ";
            // line 684
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_first", [], "any", false, false, true, 684)) {
                // line 685
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_top_first_grid_class"] ?? null), 685, $this->source), "html", null, true);
                echo "\">
                ";
                // line 687
                echo "                <div class=\"clearfix subfooter-top__section subfooter-top-first\">
                  ";
                // line 688
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_first", [], "any", false, false, true, 688), 688, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 691
                echo "              </div>
            ";
            }
            // line 693
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_second", [], "any", false, false, true, 693)) {
                // line 694
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_top_second_grid_class"] ?? null), 694, $this->source), "html", null, true);
                echo "\">
                ";
                // line 696
                echo "                <div class=\"clearfix subfooter-top__section subfooter-top-second\">
                  ";
                // line 697
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_second", [], "any", false, false, true, 697), 697, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 700
                echo "              </div>
            ";
            }
            // line 702
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_third", [], "any", false, false, true, 702)) {
                // line 703
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_top_third_grid_class"] ?? null), 703, $this->source), "html", null, true);
                echo "\">
                ";
                // line 705
                echo "                <div class=\"clearfix subfooter-top__section subfooter-top-third\">
                  ";
                // line 706
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_top_third", [], "any", false, false, true, 706), 706, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 709
                echo "              </div>
            ";
            }
            // line 711
            echo "          </div>
        </div>
      </div>
    </div>
    ";
            // line 716
            echo "  ";
        }
        // line 717
        echo "
  ";
        // line 718
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_first", [], "any", false, false, true, 718) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 718))) {
            // line 719
            echo "    ";
            // line 720
            echo "    <div class=\"clearfix subfooter ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_background_color"] ?? null), 720, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_separator"] ?? null), 720, $this->source), "html", null, true);
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["subfooter_bottom_blocks_paddings"] ?? null)) ? (" region--no-block-paddings") : ("")));
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(((($context["subfooter_bottom_region_paddings"] ?? null)) ? (" region--no-paddings") : ("")));
            echo "\">
      <div class=\"";
            // line 721
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_layout_container"] ?? null), 721, $this->source), "html", null, true);
            echo "\">
        ";
            // line 723
            echo "        <div class=\"clearfix subfooter__container\">
          <div class=\"row\">
            ";
            // line 725
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_first", [], "any", false, false, true, 725)) {
                // line 726
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_first_grid_class"] ?? null), 726, $this->source), "html", null, true);
                echo "\">
                ";
                // line 728
                echo "                <div class=\"clearfix subfooter__section subfooter-first\">
                  ";
                // line 729
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sub_footer_first", [], "any", false, false, true, 729), 729, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 732
                echo "              </div>
            ";
            }
            // line 734
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 734)) {
                // line 735
                echo "              <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["subfooter_second_grid_class"] ?? null), 735, $this->source), "html", null, true);
                echo "\">
                ";
                // line 737
                echo "                <div class=\"clearfix subfooter__section subfooter-second\">
                  ";
                // line 738
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 738), 738, $this->source), "html", null, true);
                echo "
                </div>
                ";
                // line 741
                echo "              </div>
            ";
            }
            // line 743
            echo "          </div>
        </div>
        ";
            // line 746
            echo "      </div>
    </div>
    ";
            // line 749
            echo "  ";
        }
        // line 750
        echo "
  ";
        // line 751
        if (($context["scroll_to_top_display"] ?? null)) {
            // line 752
            echo "  ";
            // line 753
            echo "    <div class=\"to-top\"><i class=\"fa ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["scroll_to_top_icon"] ?? null), 753, $this->source), "html", null, true);
            echo "\"></i></div>
  ";
            // line 755
            echo "  ";
        }
        // line 756
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/restaurant_lite/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1643 => 756,  1640 => 755,  1635 => 753,  1633 => 752,  1631 => 751,  1628 => 750,  1625 => 749,  1621 => 746,  1617 => 743,  1613 => 741,  1608 => 738,  1605 => 737,  1600 => 735,  1597 => 734,  1593 => 732,  1588 => 729,  1585 => 728,  1580 => 726,  1578 => 725,  1574 => 723,  1570 => 721,  1560 => 720,  1558 => 719,  1556 => 718,  1553 => 717,  1550 => 716,  1544 => 711,  1540 => 709,  1535 => 706,  1532 => 705,  1527 => 703,  1524 => 702,  1520 => 700,  1515 => 697,  1512 => 696,  1507 => 694,  1504 => 693,  1500 => 691,  1495 => 688,  1492 => 687,  1487 => 685,  1485 => 684,  1479 => 681,  1469 => 680,  1467 => 679,  1465 => 678,  1462 => 677,  1459 => 676,  1455 => 673,  1450 => 669,  1445 => 666,  1442 => 665,  1437 => 661,  1431 => 660,  1429 => 659,  1424 => 658,  1420 => 656,  1411 => 655,  1409 => 654,  1407 => 653,  1404 => 652,  1401 => 651,  1395 => 646,  1391 => 644,  1386 => 641,  1383 => 640,  1377 => 639,  1375 => 638,  1370 => 637,  1365 => 635,  1362 => 634,  1358 => 632,  1353 => 629,  1350 => 628,  1344 => 627,  1342 => 626,  1337 => 625,  1332 => 623,  1330 => 622,  1323 => 621,  1319 => 619,  1314 => 616,  1311 => 615,  1305 => 614,  1303 => 613,  1298 => 612,  1293 => 610,  1291 => 609,  1286 => 608,  1282 => 606,  1277 => 603,  1274 => 602,  1268 => 601,  1266 => 600,  1261 => 599,  1256 => 597,  1253 => 596,  1249 => 594,  1244 => 591,  1241 => 590,  1235 => 589,  1233 => 588,  1228 => 587,  1223 => 585,  1221 => 584,  1215 => 581,  1205 => 580,  1203 => 579,  1201 => 578,  1198 => 577,  1195 => 576,  1191 => 573,  1187 => 570,  1183 => 568,  1178 => 565,  1175 => 564,  1170 => 562,  1167 => 561,  1163 => 559,  1158 => 556,  1155 => 555,  1150 => 553,  1148 => 552,  1144 => 550,  1138 => 549,  1136 => 548,  1131 => 547,  1127 => 545,  1116 => 544,  1114 => 543,  1112 => 542,  1109 => 541,  1106 => 540,  1102 => 537,  1098 => 534,  1094 => 532,  1089 => 529,  1086 => 528,  1081 => 526,  1078 => 525,  1074 => 523,  1069 => 520,  1066 => 519,  1061 => 517,  1059 => 516,  1055 => 514,  1049 => 513,  1047 => 512,  1042 => 511,  1038 => 509,  1027 => 508,  1025 => 507,  1023 => 506,  1020 => 505,  1017 => 504,  1013 => 501,  1005 => 495,  999 => 491,  993 => 490,  991 => 489,  986 => 488,  982 => 486,  973 => 485,  971 => 484,  969 => 483,  966 => 482,  963 => 481,  959 => 478,  951 => 472,  945 => 468,  939 => 467,  937 => 466,  932 => 465,  928 => 463,  919 => 462,  917 => 461,  915 => 460,  912 => 459,  909 => 458,  905 => 455,  897 => 449,  891 => 445,  885 => 444,  883 => 443,  878 => 442,  874 => 440,  865 => 439,  863 => 438,  861 => 437,  858 => 436,  855 => 435,  851 => 432,  843 => 426,  837 => 422,  831 => 421,  829 => 420,  824 => 419,  820 => 417,  811 => 416,  809 => 415,  807 => 414,  804 => 413,  801 => 412,  797 => 409,  789 => 403,  783 => 399,  777 => 398,  775 => 397,  770 => 396,  766 => 394,  757 => 393,  755 => 392,  753 => 391,  750 => 390,  747 => 389,  743 => 386,  739 => 383,  735 => 381,  730 => 378,  727 => 377,  722 => 375,  719 => 374,  715 => 372,  710 => 369,  707 => 368,  702 => 366,  700 => 365,  696 => 363,  690 => 362,  688 => 361,  683 => 360,  679 => 358,  670 => 357,  668 => 356,  666 => 355,  663 => 354,  657 => 349,  653 => 347,  648 => 344,  645 => 343,  639 => 342,  637 => 341,  630 => 340,  625 => 338,  622 => 337,  618 => 335,  613 => 332,  610 => 331,  604 => 330,  602 => 329,  595 => 328,  590 => 326,  588 => 325,  585 => 324,  582 => 322,  576 => 320,  574 => 319,  571 => 318,  565 => 317,  563 => 316,  556 => 315,  552 => 313,  546 => 309,  543 => 308,  535 => 302,  529 => 298,  527 => 297,  525 => 296,  519 => 294,  516 => 292,  513 => 291,  509 => 288,  501 => 282,  495 => 278,  489 => 277,  487 => 276,  482 => 275,  478 => 273,  469 => 272,  467 => 271,  465 => 270,  462 => 269,  459 => 268,  455 => 265,  447 => 259,  441 => 255,  435 => 254,  433 => 253,  428 => 252,  424 => 250,  415 => 249,  413 => 248,  411 => 247,  408 => 246,  405 => 245,  401 => 242,  393 => 236,  387 => 232,  383 => 230,  376 => 229,  374 => 228,  372 => 227,  369 => 226,  366 => 225,  362 => 222,  359 => 221,  356 => 219,  353 => 218,  348 => 214,  346 => 213,  344 => 212,  341 => 211,  337 => 208,  333 => 206,  328 => 203,  325 => 202,  320 => 200,  317 => 199,  313 => 197,  308 => 194,  305 => 193,  300 => 191,  297 => 190,  293 => 188,  288 => 185,  285 => 184,  280 => 182,  278 => 181,  274 => 179,  270 => 177,  259 => 176,  257 => 175,  255 => 174,  252 => 173,  249 => 172,  245 => 169,  241 => 166,  237 => 164,  232 => 161,  229 => 160,  224 => 158,  221 => 157,  217 => 155,  212 => 152,  209 => 151,  204 => 149,  202 => 148,  198 => 146,  192 => 145,  190 => 144,  185 => 143,  181 => 141,  174 => 140,  172 => 139,  170 => 138,  167 => 137,  164 => 136,  160 => 133,  156 => 130,  152 => 128,  147 => 125,  144 => 124,  139 => 122,  136 => 121,  132 => 119,  127 => 116,  124 => 115,  119 => 113,  117 => 112,  113 => 110,  107 => 109,  105 => 108,  100 => 107,  96 => 105,  89 => 104,  87 => 103,  85 => 102,  81 => 100,  79 => 99,  77 => 98,  73 => 96,  70 => 94,  66 => 91,  63 => 89,  60 => 87,  54 => 83,  50 => 81,  43 => 79,  41 => 78,  39 => 77,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/restaurant_lite/templates/page.html.twig", "C:\\Users\\jerome.vasseur\\Downloads\\UwAmp\\www\\testIntranet\\themes\\restaurant_lite\\templates\\page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 77);
        static $filters = array("escape" => 79);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
