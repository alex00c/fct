#!/bin/bash

URL="http://fastconf.net:2812"

xdg-open "$URL"

echo "Abriendo monitor de recursos para llevar el seguimiento"
gnome-system-monitor --tab=resources &