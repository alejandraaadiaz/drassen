<?php

// Cambia el email por tu email para que lleguen los mensajes
$EmailTo = "539adiaz@gmail.com";

$Subject = "Formulario de contacto";

// Estas variables, que se marcan con el $, limpian de caracteres raros y recogen los valores de los name que coiniciden con nombre, telefono, email y mensaje. Si quieres añadir más, habría que crear variables nuevas, o quitarlas si fuera el caso.
$Name = Trim(stripslashes($_POST['nombre'])); 
$Tel = Trim(stripslashes($_POST['telefono'])); 
$Email = Trim(stripslashes($_POST['email'])); 
$Message = Trim(stripslashes($_POST['mensaje'])); 

// Aquí ponemos que el email desde el que se envía es el mail del que ha rellenado el formulario
$EmailFrom = $Email;

// Aquí creamos el cuerpo del mensaje que se enviará. Si hay más o menos variables a recoger, habría que añadir o eliminar líneas con las variables que correspondan. Vamos añadiendo valores a $Body, que es lo que se envía al final.
$Body = "";
$Body .= "Nombre: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Mensaje: ";
$Body .= $Message;
$Body .= "\n";

// Envía el email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// Una vez enviado, redirige a una página HTML de "gracias por tu mensaje" que puedes preparar, cámbiale el nombre si quieres
if ($success){
print "<meta http-equiv=\"refresh\" content=\"0;URL=muchasgracias.html\">";
}
// O si ha fallado, te redirige a una página de error
else{
print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>
