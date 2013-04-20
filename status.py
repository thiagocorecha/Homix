#!/usr/bin/env python

import sys
import re


def read_lines():
    buf = ''
    while True:
        buf += sys.stdin.read(10)
        while '\n' in buf:
            line, buf = buf.split('\n', 1)
            yield line.strip()


status_pattern = re.compile(r'^\|Temperatura1\:(?P<temp1>\d+\.\d+)\|'
                            r'\|Temperatura2\:(?P<temp2>\d+)\|'
                            r'\|Light\:(?P<light>\d+)\|$')


def main():
    for line in read_lines():
        match = status_pattern.match(line)
        if match is not None:
            print match.groupdict()


if __name__ == '__main__':
    main()
