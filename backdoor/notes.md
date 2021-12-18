# NMAP
PORT   STATE SERVICE VERSION
22/tcp 	 open  ssh     OpenSSH 8.2p1 Ubuntu 4ubuntu0.3 (Ubuntu Linux; protocol 2.0)
80/tcp 	 open  http    Apache httpd 2.4.41 ((Ubuntu))
1337/tcp open 
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

# NIKTO


# Wordpress:
- Directory listing! Enum plugins and themes
- XMLRPC present but not working
**/plugins:**
- ebookdownload
  - Version 1.1?
  - https://www.exploit-db.com/exploits/39575
  - wp-config.php
    - MySQL creds: wordpressuser:MQYBJSaD#DxG6qbm
    - DB on localhost
  - /etc/passwd:
    - User "user" has a home directory? 
