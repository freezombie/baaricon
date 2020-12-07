<!doctype html>
<html lang="en">
    <head>
        <title>Baaricon</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Advent+Pro" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        <!-- Own CSS -->
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>


        <!-- External JS files -->
        <script src="js/jquery-3.2.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
    </head>

    <body>
      <?php
      $nimi = '';
      $email = '';
      $viesti = '';
      $result = '';
      $error = '';

      if(isset($_POST["submit"]))
      {
        $from = 'From: lomake@baaricon.fi';
        $to = 'contact@baaricon.fi';
        $subject = "Viesti yhteystietolomakkeen kautta";

        if(!$_POST['formNimi'])
        {
          $error .= "Syötä nimi. ";
        }
        else
        {
          $nimi = $_POST['formNimi'];
        }
        if(!$_POST['formEmail'] || !filter_var($_POST['formEmail'], FILTER_VALIDATE_EMAIL))
        {
          $error .= "Syötä sähköposti oikeassa muodossa. ";
        }
        else
        {
          $email = $_POST['formEmail'];
        }
        if(!$_POST['formViesti'])
        {
          $error .= "Syötä viestisi. ";
        }
        else
        {
          $viesti = $_POST['formViesti'];
        }
        if(!$_POST['formCheck'])
        {
          $error .= "Et todistanut olevasi ihminen syöttämällä tapahtuman ikärajaa. ";
        }
        else
        {
          $check = intval($_POST['formCheck']);
          if($check!==18)
          {
            $error .= "Syötit väärän ikärajan. Syötä kaksinumeroinen numero. ";
          }
        }

        if(!$error || $error == '')
        {
          $posti ="From $nimi\nE-Mail: $email\nViesti:\n $viesti";
          if(mail($to,$subject,$posti,$from))
          {
            $result='<div class="alert alert-success">Kiitos! Viestisi on lähetetty.</div>"';
          }
          else
          {
            $result='<div class="alert alert-danger">Viestin lähettämisessä on sattunut virhe. Yrittäisitkö myöhemmin uudelleen tai ottaisitko suoraan sähköpostilla yhteyttä? Kiitos!</div>"';
          }
        }
      }
      ?>
      <nav class="navbar navbar-inverse"> <!-- navbar-inverse -->
          <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-content" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.html"><img src="img/baaricon_korkki_b60404.png" style="height:1em; margin-top:-10px;"></a>
              </div>

              <div class="collapse navbar-collapse navbar-right" id="nav-content">
                  <ul class="nav navbar-nav">
                      <li><a href="index.html">Etusivu <span class="sr-only">(Nykyinen sivu)</span></a></li>
                      <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tapahtuma<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li><a href="tapahtuma.html">Yleistä</a></li>
                              <li><a href="ohjelma.html">Ohjelma</a></li>
                              <li><a href="jarjestyssaannot.html">Järjestyssäännöt</a></li>
                              <li><a href="majoitus.html">Majoitus</a></li>
                              <li><a href="tapahtumapaikka.html">Tapahtumapaikka</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="hotstuff.html">HOT STUFF</a></li>
                          </ul>
                      </li>
                      <li><a href="liput.html">Liput</a></li>
                      <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Yhteystiedot<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                              <li class="active"><a href="yhteystiedot.php">Ota yhteyttä</a></li>
                              <li><a href="conitea.html">Järjestäjät</a></li>
                          </ul>
                      </li>
                      <li><a href="english.html">In English</a></li>
                  </ul>
              </div>
          </div>
      </nav>

      <div class="container-fluid">
        <div class="content">
          <div class="maincontent">
          <h3>Ota yhteyttä!</h3>
          <br/>
          <div class="row">
             <div class="col-md-6 col-md-offset-3">
                 <p class="TextContent">
                     Jos sinulla herää kysymyksiä, toiveita, ideoita tai ylipäätään mitään askarruttavaa tapahtumaan liittyen, ota yhteyttä! Yhteydenotto onnistuu joko sähköpostitse
                     <a href="mailto:contact@baaricon.fi" target="_top">contact@baaricon.fi</a>, sosiaalisessa mediassa tai vaikka alla olevaa yhteydenottolomaketta käyttäen.
                     <br>
                 </p>
             </div>
          </div>
          <div class="row">          
          <form class="form-horizontal" role="form" method="post" action="yhteystiedot.php">
            <div class="col-md-4 col-md-offset-2">
              <div class="form-group">
                <label class="col-md-2 control-label" for="formNimi">Nimi</label>
                <div class="col-md-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class='form-control' id='formNimi' name='formNimi'placeholder="Erkki Esimerkki" value="<?php echo htmlspecialchars($nimi); ?>"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-md-2 control-label" for="formEmail">Email</label>
                <div class="col-md-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" class="form-control" id="formEmail" name='formEmail' placeholder="essi.esimerkki@domain.com" value="<?php echo htmlspecialchars($email); ?>"/>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                  <label class="col-md-1 control-label" for="formViesti">Viesti</label>
                  <div class="col-md-11">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                      <textarea class="form-control" rows='5' placeholder="Viestisi" id="formViesti" name='formViesti'><?php echo htmlspecialchars($viesti); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-10" style="margin-left: 1.5%;">
                <div class="form-group">
                  <label class="col-md-3 control-label hidden-xs hidden-sm" for="formCheck">Ethän ole robotti? Mikä on tapahtuman ikäraja?</label>
                  <label class="col-xs-12 control-label hidden-md hidden-lg" for="formCheck" style="text-align: left;">Ethän ole robotti? <br/>Mikä on tapahtuman ikäraja?</label>
                  <div class="col-xs-6 col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input type="number" class="form-control" id="formCheck" name='formCheck' placeholder="00"; />
                    </div>
                  </div>
                  <div class="col-xs-2 col-xs-offset-3"> <!--tän marginin näemmä pitää muuttua koon mukana. -->
                    <div class="form-group">
                      <button type="submit" class="btn btn-warning" id="submit" name="submit">Lähetä <span class="glyphicon glyphicon-send"></span></button>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
        <div class='row'>
          <?php echo "<p class='text-danger'>$error</p>";?>
          <?php echo $result; ?>
        </div>
      </div>
    </div>
  </div>
      <footer>
          <hr class="style13">
          <div class="container-fluid">
          <div class="row">
              <div class="col-md-2 col-sm-3 hidden-xs col-md-offset-1"><a href="http://www.operaatiofredrik.com"><img src="img/fredrik_logo.PNG" class="img-responsive OF center-block" alt="Show-cosplay-yhdistys OF ry"></a></div>
              <div class="col-md-3 visible-md visible-lg"><a href="http://www.45special.com/"><img src="img/45_special_inline.png" class="img-responsive nelivitonennormi center-block" alt="45 Special"> <img src="img/45-icon.png" class="img-responsive nelivitonenmobiili center-block" alt="45 Special"></a></div>
              <div class="col-md-1 col-sm-1 col-xs-4 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 text-center"><a href="https://twitter.com/baaricon"><i class="fa fa-twitter-square fa-3x"></i></a></div>
              <div class="col-md-1 col-sm-1 col-xs-4 col-xs-offset-0 col-sm-offset-1 col-md-offset-0 text-center"><a href="https://www.facebook.com/Baaricon/"><i class="fa fa-facebook-square fa-3x"></i></a></div>
              <div class="col-md-1 col-sm-1 col-xs-4 col-xs-offset-0 col-sm-offset-1 col-md-offset-0 text-center"><a href="https://www.instagram.com/baaricon/"><i class="fa fa-instagram fa-3x"></i></a></div>
              <div class="col-xs-4 visible-xs"><a href="http://www.operaatiofredrik.com"><img src="img/fredrik_logo.PNG" class="img-responsive OF center-block" alt="Show-cosplay-yhdistys OF ry"></a></div>
              <div class="col-md-2 hidden-sm col-xs-4 col-md-offset-0"><h1 class="k18">K-18</h1></div>
              <div class="hidden-lg hidden-md col-sm-3 col-xs-4 col-sm-offset-1 col-md-offset-2"><a href="http://www.45special.com/"><img src="img/45_special_inline.png" class="img-responsive nelivitonennormi center-block" alt="45 Special"><img src="img/45-icon.png" class="img-responsive nelivitonenmobiili center-block" alt="45 Special"></a></div>
              <div class="col-sm-4 visible-sm col-sm-offset-1"><h1 class="k18">K-18</h1></div>
          </div>
          <div class="row">
          <div class="col-lg-12 copyright">
              <p class="text-uppercase">&copy Antti Pikkuaho & Sami Räbinä 2018</p>
          </div>
          </div>
          </div>
      </footer>
    </body>
</html>
