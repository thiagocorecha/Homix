#!/bin/bash

MOUNTPOINT=/var/lib/mysql/homix
mount -t tmpfs -o size=20m tmpfs $MOUNTPOINT
chown mysql:mysql $MOUNTPOINT
chmod 700 $MOUNTPOINT
cd $MOUNTPOINT
tar xzf /var/local/Homix/db.tgz
