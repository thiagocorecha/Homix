#!/usr/bin/env python

import sys
import os
import re
from datetime import datetime
import json

STATE_FILE = os.environ.get('STATE_FILE', '/tmp/arduino_state.json')


def read_lines():
    buf = ''
    while True:
        buf += sys.stdin.read(10)
        while '\n' in buf:
            line, buf = buf.split('\n', 1)
            yield line.strip()


status_pattern = re.compile(r'^\|Temperatura\:(?P<temp>\d+)\|'
                            r'\|Light\:(?P<light>\d+)\|$')


def update_loop():
    for line in read_lines():
        match = status_pattern.match(line)
        if match is not None:
            state = {
                'temp': int(match.group('temp')),
                'light': int(match.group('light')),
                'timestamp': datetime.now().isoformat(),
            }
            save_state(state)


def save_state(state):
    temp_state_file = STATE_FILE + '.tmp'
    with open(temp_state_file, 'wb') as f:
        json.dump(state, f, indent=2)
    os.rename(temp_state_file, STATE_FILE)


def main():
    update_loop()


if __name__ == '__main__':
    main()
