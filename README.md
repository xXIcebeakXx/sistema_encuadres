# sistema_encuadres
Repositorio público para el desarrollo de un sistema de encuadres de universidad.

# Descripcion de algunos archivos

# HTML
-- Son los formularios para llenar con los temas, prácticas, observaciones de cada semana
crearencuadre.html
encuadre2.html
-- Son los templates que utiliza DOMPDF como referencia para generar el PDF siguiendo las pautas anteriormente establecidas para el encuadre de Ing. como para Arq.
template.html
template_arqui.html

# PHP
-- Script php que se encarga de tomar lo capturado en cualquiera de los formularios y generar su pdf
phpgen2.php
--  Script php que se encarga de redireccionar al tipo de formulario segun la carrera (arq o ing)
redirex.php
-- Script php que se encarga de re-establecer la contraseña en caso de olvidarla (no implementada)
pwdrequest.php
