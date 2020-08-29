#!/bin/bash

PYTHON_COMMAND="python3.7"

if ! python3.7 --version &> /dev/null
then
    if ! python --version &> /dev/null
    then
        echo "Python 3.7 is not installed"
        echo "Exiting..."
        exit
    else
        PYTHON_COMMAND="python"
    fi
fi

PYTHON_VERSION_COMMAND="$PYTHON_COMMAND -c 'import sys; print(\".\".join(map(str, sys.version_info[:3])))'"
PYTHON_VERSION=$(eval "$PYTHON_VERSION_COMMAND")

if [[ ! $PYTHON_VERSION == *"3.7"* ]]
then
    echo "Python installation found but project requires python 3.7"
    echo "Exiting..."
    exit
fi

VENV_EXISTS=true

if [ ! -d "venv" ]
then
    echo "Python virtual environment does not exist"
    VENV_EXISTS=false
elif ! ./venv/bin/python --version &> /dev/null
then
    echo "Python virtual environment exists but python command was not found"
    rm -rf venv
    VENV_EXISTS=false
else
    echo "Python virtual environment found"
fi

if [ ! $VENV_EXISTS ]
then
    echo "Creating python virtual environment..."
    $PYTHON_COMMAND -m venv venv
    echo "Created python virtual environment"
fi

echo "Installing python requirements..."
./venv/bin/pip install -r requirements.txt
echo "Installed python requirements"

if [ ! -f neural_style/models/vgg19-d01eb7cb.pth ]; then
    echo "neural_style/models/svgg19-d01eb7cb.pth not found"
    echo "Downloading file..."

    curl -o neural_style/models/vgg19-d01eb7cb.pth https://web.eecs.umich.edu/~justincj/models/vgg19-d01eb7cb.pth

    echo "File downloaded"
fi

GPT_MODEL_FOLDERS=("gpt/models/100_fal" "gpt/models/model_name")

for gpt_folder in "${GPT_MODEL_FOLDERS[@]}"
do
    if [ ! -d "$gpt_folder" ]
    then
        echo "$gpt_folder not found"
        echo "Creating folder..."

        mkdir "$gpt_folder"

        echo "$gpt_folder folder created"
    fi
done

GPT_MODEL_100_FAL_FILES=("vocab.bpe" "hparams.json" "counter" "model-1200.meta"
"model-1200.data-00000-of-00001" "model-1200.index" "checkpoint" "encoder.json")

for file in "${GPT_MODEL_100_FAL_FILES[@]}"
do
    if [ ! -f "gpt/models/100_fal/$file" ]
    then
        echo "gpt/models/100_fal/$file not found"
        echo "Downloading file..."

        curl -o gpt/models/100_fal/"$file" https://minio.hitch-dev.tedhouse.org/public/tmp/100_fal/"$file"
    fi
done

GPT_MODEL_MODEL_NAME_FILES=("vocab.bpe" "hparams.json" "encoder.json")

for file in "${GPT_MODEL_MODEL_NAME_FILES[@]}"
do
    if [ ! -f gpt/models/model_name/"$file" ]
    then
        echo "gpt/models/model_name/$file not found"
        echo "Downloading file..."

        curl -o gpt/models/model_name/"$file" https://minio.hitch-dev.tedhouse.org/public/tmp/model_name/"$file"
    fi
done

echo "Installation complete"
