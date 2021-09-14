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

sitebackup.zip
