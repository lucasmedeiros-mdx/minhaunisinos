
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login &middot; Veja suas notas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php 
      echo $this->Html->css(array(
        'bootstrap',
        'system',
        'bootstrap-responsive'
      ));
    
      $this->fetch('css');
    ?>

    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">

  </head>

  <body>

    <div class="container">
      <?php 
        echo $this->Session->flash();
        echo $this->fetch('content'); 
      ?>
    </div>

    <footer class="footer">
      <div class="container">
        <p>Desenvolvido por VitorVRS.</p>
        <ul class="footer-links">
          <li><a href="mailto:vitor.vrs@gmail.com">Bugs</a></li>
          <li class="muted">·</li>
          <li><a href="mailto:vitor.vrs@gmail.com">Sugestões</a></li>
          <li class="muted">·</li>
          <li><a href="http://twitter.github.io/bootstrap">Bootstrap</a></li>
        </ul>
      </div>
    </footer>

    <?php

      echo $this->Html->script(array(
        'jquery.js',
        'bootstrap.min.js',
        'system.js',
        #'bootstrap-transition.js',
        #'bootstrap-alert.js',
        #'bootstrap-modal.js',
        #'bootstrap-dropdown.js',
        #'bootstrap-scrollspy.js',
        #'bootstrap-tab.js',
        #'bootstrap-tooltip.js',
        #'bootstrap-popover.js',
        #'bootstrap-button.js',
        #'bootstrap-collapse.js',
        #'bootstrap-carousel.js',
        #'bootstrap-typeahead.js'
      ));

      $this->fetch('script');

    ?>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-40972420-1', 'vitorvrs.com');
      ga('send', 'pageview');

    </script>
    
  </body>
</html>
