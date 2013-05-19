<?php
require 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '348408031948185',
  'secret' => 'a351038a411b679e8474e72415b68769',
));
// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged in	to
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta charset="utf-8">
    <title>Monsters Softball</title>
    <meta name="description" content="Monsters SoftBall">
    <meta name="author" content="Jose Montes">
    <!—[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]—>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body { padding-top: 60px; }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	 <link href="bootstrap/css/Utilerias.css" rel="stylesheet">
      
  </head>
  <body>

<div class="container">
  <h1>Monsters SoftBall</h1>
  <p>Torneo de SoftBall.</p>
</div> 
	
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="brand" href="#">Montes Inc</a>
      <ul class="nav">
        <li class="inicio"><a href="#">Inicio</a></li>
		 <li><a href="#jornadas">Jornadas</a></li>
        <li><a href="#standing">Standing</a></li>
        <li><a href="#contact">Contacto</a></li>
				<a href="<?php echo $loginUrl; ?>">Login con Facebook</a>
		
    

    
      </ul>
    </div>
  </div>
</div>

<div class="container">
  <h2>Calendario de juegos</h2>
  <div Id="jornadas">
	<table class="table table-bordered">
        <thead>
           <tr>
           <th>LOCAL</th>
           <th>VISITA</th>
           <th>FECHA</th>
           <th>HORA</th>
		   <th>CAMPO</th>
           </tr>
         </thead>
              <tbody>
                <tr>
                  <td >1</td>
                  <td>MONSTERS</td>
                  <td>KUICOS</td>
                  <td>19 MAYO 2013</td>
				  <td>13:00</td>
				  <TD>C1</TD>
                </tr>
                   <tr>
                  <td>1</td>
                  <td>MONSTERS</td>
                  <td>MOLDES</td>
                  <td>19 MAYO 2013</td>
				  <td>13:00</td>
				  <TD>C1</TD>
                </tr>
				   <tr>
                  <td>1</td>
                  <td>MONSTERS</td>
                  <td>HORMIGAS</td>
                  <td>19 MAYO 2013</td>
				  <td>13:00</td>
				  <TD>C1</TD>
                </tr>
              </tbody>
            </table>
          </div>
		  
		  
<h2>Jornadas</h2>
<table class="table table-bordered">
<caption> ...</caption>
  <thead>
    <tr>
      <th>Jornada</th>
	  <th>Fecha</th>
	  <th>Equipo 1</th>
      <th>Resultado</th>
	  <th>Equipo 2</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
	  <td>12 Mayo 2013 13:00</td>	  
      <td>Monsters</td>
	  <td>0 - 13</td>
      <td>Kuicos</td>
    </tr>
	   <tr>
      <td>2</td>
	  <td>19 Mayo 2013 11:00</td>	  
      <td>Monsters</td>
	  <td>12 - 1</td>
      <td>Moldes</td>
    </tr>
  </tbody>
</table>

<div id="standing" class="example">
  <h1>Standing</h1>
<table class="table table-bordered">
<caption>La infomarcion que se muestra aqui, se actualiza en tiempo real ...</caption>
  <thead>
    <tr>
      <th>RankID</th>
	  <th>LogoTeam</th>
      <th>Equipo</th>
	  <th>Jugado</th>
	  <th>Ganado</th>
	  <th>Perdido</th>
	  <th>CA</th>
	  <th>CC</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
	  <td>..</td>	  
      <td>Monsters</td>
	  <td>2</td>
      <td>1</td>
	  <td>1</td>
      <td>12</td>
	  <td>13</td>
    </tr>
  </tbody>
</table>
</div>

   <div class="page-header">
            <h1>Jugador</h1>
    </div>
    <form method="POST" action="contact-form-submission.php" class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="input1">Name</label>
                <div class="controls">
                    <input type="text" name="contact_name" id="input1" placeholder="Your name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input2">Email Address</label>
                <div class="controls">
                    <input type="text" name="contact_email" id="input2" placeholder="Your email address">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input3">Message</label>
                <div class="controls">
                    <textarea name="contact_message" id="input3" rows="8" class="span5" placeholder="The message you want to send to me."></textarea>
                </div>
            </div>
            <div class="form-actions">
                <input type="hidden" name="save" value="contact">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
    </form>
        
    </div>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

	
	
  </body>
</html>
