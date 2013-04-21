#!/usr/bin/env python

import os
import re
from datetime import datetime
import time
import json
import subprocess

STATE_FILE = os.environ.get('STATE_FILE', '/tmp/arduino_state.json')
SAVE_INTERVAL = 10


def read_lines(infile):
    buf = ''
    while True:
        buf += infile.read(10)
        while '\n' in buf:
            line, buf = buf.split('\n', 1)
            yield line.strip()


status_pattern = re.compile(r'^\|Temperatura\:(?P<temp>\d+)\|'
                            r'\|Light\:(?P<light>\d+)\|$')


def update_loop(infile, outpipe):
    last_save = 0
    for line in read_lines(infile):
        if line:
	    print>>outpipe, line
	    outpipe.flush()
        match = status_pattern.match(line)
        if match is not None:
            state = {
                'temp': int(match.group('temp')),
                'light': int(match.group('light')),
                'timestamp': datetime.now().isoformat(),
            }
            now = time.time()
            if now - last_save > SAVE_INTERVAL:
                save_state(state)
                last_save = now


def save_state(state):
    sqlcmd = 'UPDATE acm SET temperatura="{temp}", lumina="{light}"'
    subprocess.check_call(['mysql', '-u', 'root', '-proot', 'homix',
                           '-e', sqlcmd.format(**state)])


def main():
    with open('/dev/ttyACM0', 'rb') as infile:
        with open('raw_out', 'wb') as outpipe:
            update_loop(infile, outpipe)


if __name__ == '__main__':
    main()
