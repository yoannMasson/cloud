<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?= $title ?></title>
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>

    <body>
      <nav>
        <div class="nav-wrapper">
          <a class="brand-logo"><i class="material-icons">cloud</i>Cloud computing Assignement</a>
          <ul class="right hide-on-med-and-down">
          <li><a href="index.php?action=login">Logout</a></li>
        </ul>
        </div>
      </nav>
      <div class="container">
        <?= $content ?>
      </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>
        $(document).ready(function() {
          $('select').material_select();
          });
        </script>
    </body>
</html>
