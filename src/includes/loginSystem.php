<?php
function autenticarConLDAP($username, $password)
{
  // Configuración del servidor LDAP
  $ldapServer = "ldap://openldap-server:389"; // Reemplaza con la dirección de tu servidor LDAP
  $ldapBaseDn = "dc=example,dc=org"; // Reemplaza con tu base DN
  $ldapAdminDn = "cn=admin,$ldapBaseDn"; // Usuario de administrador de LDAP
  $ldapAdminPassword = "24082004"; // Contraseña del usuario de administrador de LDAP

  // Intentar autenticar con el servidor LDAP
  $ldapConn = ldap_connect($ldapServer);
  if (!$ldapConn) {
    return false; // No se pudo conectar al servidor LDAP
  }

  ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
  ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);

  // Intentar la autenticación
  if (ldap_bind($ldapConn, $ldapAdminDn, $ldapAdminPassword)) {
    // Búsqueda del usuario en el LDAP
    $filter = "(uid=$username)";
    $attributes = ["dn"];
    $search = ldap_search($ldapConn, $ldapBaseDn, $filter, $attributes);

    if ($search) {
      $entries = ldap_get_entries($ldapConn, $search);

      if ($entries["count"] === 1) {
        // Intentar autenticar con las credenciales del usuario
        $userDn = $entries[0]["dn"];
        if (ldap_bind($ldapConn, $userDn, $password)) {
          ldap_close($ldapConn);
          return true; // Autenticación exitosa
        }
      }
    }
  }

  ldap_close($ldapConn);
  return false; // Autenticación fallida
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recuperar los datos del formulario de inicio de sesión
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Realizar la autenticación LDAP aquí (usando el código anterior)

  if (autenticarConLDAP($username, $password)) {
    // Autenticación exitosa, redirigir a la página de inicio
    header("Location: ../index.php");
    exit;
  } else {
    // Autenticación fallida, mostrar un mensaje de error
    $error = "Error en la autenticación LDAP";
    header("Location: ../login.php");
  }
}