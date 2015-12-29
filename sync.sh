#!/bin/bash

#Script para linux de sincronización de repositorios 
#por Martín Vázquez

#INSTRUCCIONES
#Para que este script sea funcional, debemos haber
#seguido los pasos descritos en el siguiente enlace
#https://help.github.com/articles/fork-a-repo/

#En la linea indicada escribimos la dirección
#donde hemos clonado nuestro repositorio
#la mía está ahí como ejemplo
#NOTA:El nombre del repositorio será siempre ET3

echo ACTUALIZANDO EL REPOSITORIO ET3
#Cambiar aqui------------------------------
cd /var/www/html/ET3
#------------------------------------------
git fetch upstream
echo ---x---x---x---x---x---x---x---x---
git checkout master
echo ---x---x---x---x---x---x---x---x---
git merge upstream/master
echo -------------DONE------------------

