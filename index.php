<?php

/**
 *  Example for handling logout requests
 *
 * PHP Version 7
 *
 * @file     example_logout.php
 * @category Authentication
 * @package  PhpCAS
 * @author   Joachim Fritschi <jfritschi@freenet.de>
 * @author   Adam Franco <afranco@middlebury.edu>
 * @license  http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link     https://wiki.jasig.org/display/CASC/phpCAS
 */

// Load the settings from the central config file
require_once 'cas-config.php';
// Load the CAS lib
require_once $phpcas_path . '/CAS.php';

// Enable debugging
phpCAS::setLogger();
// Enable verbose error messages. Disable in production!
phpCAS::setVerbose(true);

// Initialize phpCAS
phpCAS::client(CAS_VERSION_3_0, $cas_host, $cas_port, $cas_context, $client_service_name);

// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);

// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();

// handle incoming logout requests
phpCAS::handleLogoutRequests();

// Or as an advanced featue handle SAML logout requests that emanate from the
// CAS host exclusively.
// Failure to restrict SAML logout requests to authorized hosts could
// allow denial of service attacks where at the least the server is
// tied up parsing bogus XML messages.
// phpCAS::handleLogoutRequests(true, $cas_real_hosts);

// force CAS authentication
phpCAS::forceAuthentication();

// for this test, simply print that the authentication was successfull
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FUAB.CC - Escurçador web de la FUAB</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
      <div id="capsula">
        <div class="barralogin">Hola, <?php echo phpCAS::getUser(); ?></div>
        <img src="img/logo-fuab.png" id="logofuab"/>
        <h1>Escurçador web FUAB</h1>
        <p>Introdueix la URL que vulguis acurtar al camp següent:
        <form>
            <input type="text" name="url" id="url"><br />
            <p class="alerta" id="alertaURL">La URL no té un format correcte!</p>

            <p>Pots personalitzar la teva adreça posant un sufix a continuació. Només lletres, números i guions:</p>
            <input type="text" name="tag" id="tag"><br />
            <p class="alerta" id="alertaAlias">L'àlies te caràcters no permesos!</p>
            <input type="hidden" id="metode" value="afegir">
            <p><button type="button" class="boto" id="botoEnviar">Enviar</button></p>
            <p>&nbsp;</p>
        </form>  
        <?php include("peu.html");?>
      </div>
    </main>
	<script src="./script.js"></script>
  </body>
</html>