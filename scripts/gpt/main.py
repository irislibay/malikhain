import sys
import json
import os
import numpy as np
import tensorflow as tf

from src import model, sample, encoder

basedir = os.path.dirname(os.path.abspath(__file__))

def textFilter(lines):
    lines = str(lines)
    lines = lines.replace("['", "")
    lines = lines.replace("']", "")
    lines = lines.replace("[\"", "")
    lines = lines.replace("\"]", "")
    lines = lines.replace("', '", "")
    lines = lines.replace("', \"", "")
    lines = lines.replace("\", '", "")
    lines = lines.replace("\", \"", "")
    lines = '<br>'.join(lines.split("\\n','"))
    lines = '<br>'.join(lines.split("\\n"))
    lines = lines.replace("\\", "")

    return lines

def get_poem_chunks(out_texts, n=50):
    poem_chunks = []

    for out_text in out_texts:
        poem_chunks += out_text.split('<|endoftext|>')
    pc = []
    for chunk in poem_chunks:
        if len(chunk)>=50:
            pc.append(chunk)
    return pc

def interact_model(
    raw_poem=None,
    model_name='100_fal',
    seed=150,
    nsamples=1,
    batch_size=1,
    length=140,
    temperature=1,
    top_k=0,
    top_p=0.0,
):
    """
    Interactively run the model
    :model_name=117M : String, which model to use
    :seed=None : Integer seed for random number generators, fix seed to reproduce
     results
    :nsamples=1 : Number of samples to return total
    :batch_size=1 : Number of batches (only affects speed/memory).  Must divide nsamples.
    :length=None : Number of tokens in generated text, if None (default), is
     determined by model hyperparameters
    :temperature=1 : Float value controlling randomness in boltzmann
     distribution. Lower temperature results in less random completions. As the
     temperature approaches zero, the model will become deterministic and
     repetitive. Higher temperature results in more random completions.
    :top_k=40 : Integer value controlling diversity. 1 means only 1 word is
     considered for each step (token), resulting in deterministic completions,
     while 40 means 40 words are considered at each step. 0 (default) is a
     special setting meaning no restrictions. 40 generally is a good value.
    """
    input_list = [raw_poem]

    if batch_size is None:
        batch_size = 1
    assert nsamples % batch_size == 0

    enc = encoder.get_encoder(model_name)
    hparams = model.default_hparams()
    with open(os.path.join(basedir, 'models', model_name, 'hparams.json')) as f:
        hparams.override_from_dict(json.load(f))

    if length is None:
        length = hparams.n_ctx // 2
    elif length > hparams.n_ctx:
        raise ValueError("Can't get samples longer than window size: %s" % hparams.n_ctx)

    with tf.Session(graph=tf.Graph()) as sess:
        context = tf.placeholder(tf.int32, [batch_size, None])
        np.random.seed(seed)
        tf.set_random_seed(seed)
        output = sample.sample_sequence(
            hparams=hparams, length=length,
            context=context,
            batch_size=batch_size,
            temperature=temperature, top_k=top_k, top_p=top_p
        )

        saver = tf.train.Saver()
        ckpt = tf.train.latest_checkpoint(os.path.join(basedir, 'models', model_name))
        saver.restore(sess, ckpt)

        out_text = []

        if raw_poem in input_list:
            context_tokens = enc.encode(raw_poem)
            generated = 0
            for _ in range(nsamples // batch_size):
                out = sess.run(output, feed_dict={
                    context: [context_tokens for _ in range(batch_size)]
                })[:, len(context_tokens):]
                for i in range(batch_size):
                    generated += 1
                    text = enc.decode(out[i])
                    out_text.append(text)

        text = get_poem_chunks(out_text)

        return textFilter(text)

text = sys.argv[1]

print(interact_model(text))
