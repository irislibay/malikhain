#!/bin/bash

PWD=$(pwd)

if [[ $PWD =~ *"/neural_style" ]]
then
    PWD="$PWD/../../"
fi

"$PWD/scripts/venv/bin/python" scripts/neural_style/main.py "$1" "$2"
