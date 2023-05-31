#!/bin/bash

# Iniciar XAMPP 
echo "Iniciando XAMPP"
sudo /opt/lampp/manager-linux-x64.run &

# Esperar a que se inicie XAMPP
sleep 5

# Iniciar Apache
echo "Iniciando Apache..."
sudo /opt/lampp/lampp startapache

# Verificar Apache
if [ $? -eq 0 ]; then
  echo "Apache se ha iniciado correctamente."
else
  echo "Ha ocurrido un error al iniciar Apache."
  exit 1
fi

# Iniciar MySQL
echo "Iniciando MySQL..."
sudo /opt/lampp/lampp startmysql

rm -f /opt/lampp/var/mysql/fastconf.net.pid 2>/dev/null

# Verificar MySQL
if [ $? -eq 0 ]; then
  echo "MySQL se ha iniciado correctamente."
else
  echo "Ha ocurrido un error al iniciar MySQL."
  exit 1
fi

# Mostrar información sobre los servicios
/opt/lampp/lampp status

exit 0