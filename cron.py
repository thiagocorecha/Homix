#!/usr/bin/env python

import time
import subprocess

INTERVAL = 2


def main():
    while True:
        subprocess.check_call(['curl', 'http://localhost/senzor.php'])
        time.sleep(INTERVAL)

if __name__ == '__main__':
    main()
