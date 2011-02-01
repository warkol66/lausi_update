#!/bin/bash

if [ ! -n "$1" ]
then
  echo "debe indicar el directorio donde quiere renombrar"
  exit 1;
fi  

current=$(pwd)

cd $1

files=$(ls -1 | grep .php)

for x in $files
do
mv $x Import$x
done

cd $current

exit 0;
