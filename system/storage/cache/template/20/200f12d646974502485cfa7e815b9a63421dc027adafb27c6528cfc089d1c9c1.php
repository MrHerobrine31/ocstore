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

/* install/step_4.twig */
class __TwigTemplate_9afc6c4b537e3139cbc190f62c321d6287ef93921a70ba6009ff623a4874a50a extends \Twig\Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo "
<div class=\"container\">
  <header>
    <div class=\"row\">
      <div class=\"col-sm-6\">
        <h1 class=\"pull-left\">4
          <small>/4</small>
        </h1>
        <h3>";
        // line 9
        echo ($context["heading_title"] ?? null);
        echo "
          <br>
          <small>";
        // line 11
        echo ($context["text_step_4"] ?? null);
        echo "</small>
        </h3>
      </div>
      <div class=\"col-sm-6\">
        <div id=\"logo\" class=\"pull-right hidden-xs\"><img src=\"view/image/logo.png\" alt=\"OpenCart\" title=\"OpenCart\" /></div>
      </div>
    </div>
  </header>
  <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
        // line 19
        echo ($context["error_warning"] ?? null);
        echo " <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>
  <div class=\"visit\">
    <div class=\"row\">
      <div class=\"col-sm-5 col-sm-offset-1 text-center\">
        <p><i class=\"fa fa-shopping-cart fa-5x\"></i></p>
        <a href=\"../\" class=\"btn btn-secondary\">";
        // line 24
        echo ($context["text_catalog"] ?? null);
        echo "</a>
      </div>
      <div class=\"col-sm-5 text-center\">
        <p><i class=\"fa fa-cog fa-5x white\"></i></p>
        <a href=\"../admin/\" class=\"btn btn-secondary\">";
        // line 28
        echo ($context["text_admin"] ?? null);
        echo "</a>
      </div>
    </div>
  </div>
  <div class=\"modules\">
  <div class=\"row\" id=\"extension\">
    <h2 class=\"text-center\"><i class=\"fa fa-circle-o-notch fa-spin\"></i> ";
        // line 34
        echo ($context["text_loading"] ?? null);
        echo "</h2>
  </div>
    <div class=\"row\">
      <div class=\"col-sm-12 text-center\"><a href=\"https://opencartforum.com/files/?utm_source=ocstore3_install&utm_medium=store_link&utm_campaign=ocstore3_install\" target=\"_BLANK\" class=\"btn btn-default\">";
        // line 37
        echo ($context["text_extension"] ?? null);
        echo "</a></div>
    </div>
  </div>
  <div class=\"mailing\">
    <div class=\"row\">
      <div class=\"col-sm-12\"><i class=\"fa fa-envelope-o fa-5x\"></i>
        <h3>";
        // line 43
        echo ($context["text_mail"] ?? null);
        echo "
          <br/>
          <small>";
        // line 45
        echo ($context["text_mail_description"] ?? null);
        echo "</small>
        </h3>
        <a href=\"https://ocstore.com/subscribe/\" target=\"_BLANK\" class=\"btn btn-secondary\">";
        // line 47
        echo ($context["button_mail"] ?? null);
        echo "</a>
      </div>
    </div>
  </div>
  <div class=\"support text-center\">
    <div class=\"row\">
      <div class=\"col-sm-4\">
        <a href=\"https://www.facebook.com/opencartforum\" class=\"icon transition\"><i class=\"fa fa-facebook fa-4x\"></i></a>
        <h3>";
        // line 55
        echo ($context["text_facebook"] ?? null);
        echo "</h3>
        <p>";
        // line 56
        echo ($context["text_facebook_description"] ?? null);
        echo "</p>
        <a href=\"https://www.facebook.com/opencartforum\">";
        // line 57
        echo ($context["text_facebook_visit"] ?? null);
        echo "</a>
      </div>
      <div class=\"col-sm-4\">
        <a href=\"https://opencartforum.com/?utm_source=ocstore_install&utm_medium=forum_link&utm_campaign=ocstore_install\" class=\"icon transition\"><i class=\"fa fa-comments fa-4x\"></i></a>
        <h3>";
        // line 61
        echo ($context["text_forum"] ?? null);
        echo "</h3>
        <p>";
        // line 62
        echo ($context["text_forum_description"] ?? null);
        echo "</p>
        <a href=\"https://opencartforum.com/?utm_source=ocstore_install&utm_medium=forum_link&utm_campaign=ocstore_install\">";
        // line 63
        echo ($context["text_forum_visit"] ?? null);
        echo "</a>
      </div>
      <div class=\"col-sm-4\">
        <a href=\"https://dedicated.ocstore.com/?utm_source=ocstore3_install\" class=\"icon transition\"><i class=\"fa fa-user fa-4x\"></i></a>
        <h3>";
        // line 67
        echo ($context["text_commercial"] ?? null);
        echo "</h3>
        <p>";
        // line 68
        echo ($context["text_commercial_description"] ?? null);
        echo "</p>
        <a href=\"https://dedicated.ocstore.com/?utm_source=ocstore3_install\" target=\"_BLANK\">";
        // line 69
        echo ($context["text_commercial_visit"] ?? null);
        echo "</a>
      </div>
    </div>
  </div>
</div>
";
        // line 74
        echo ($context["footer"] ?? null);
        echo "
<script type=\"text/javascript\"><!--
  \$(document).ready(function() {
    \$.ajax({
      url: '";
        // line 78
        echo ($context["extension"] ?? null);
        echo "',
      type: 'post',
      dataType: 'json',
      success: function(json) {
        if (json['extensions']) {
          html  = '';

          for (i = 0; i < json['extensions'].length; i++) {
            extension = json['extensions'][i];

            html += '<div class=\"col-sm-6 module\">';
            html += '  <a class=\"thumbnail pull-left\" href=\"' + extension['href'] + '\"><img src=\"' + extension['image'] + '\" alt=\"' + extension['name'] + '\" /></a>';
            html += '  <h5>' + extension['name'] + '</h5>';
            html += '  <p>' + extension['price'] + ' <a target=\"_BLANK\" href=\"' + extension['href'] + '\">";
        // line 91
        echo ($context["text_view"] ?? null);
        echo "</a></p>';
            html += '  <div class=\"clearfix\"></div>';
            html += '</div>';
          }

          \$('#extension').html(html);
        } else {
          \$('#extension').fadeOut();
        }
      }
    });
  });
  //--></script>
";
    }

    public function getTemplateName()
    {
        return "install/step_4.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 91,  177 => 78,  170 => 74,  162 => 69,  158 => 68,  154 => 67,  147 => 63,  143 => 62,  139 => 61,  132 => 57,  128 => 56,  124 => 55,  113 => 47,  108 => 45,  103 => 43,  94 => 37,  88 => 34,  79 => 28,  72 => 24,  64 => 19,  53 => 11,  48 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "install/step_4.twig", "");
    }
}
