# NMAP
Nmap scan report for horizontall.htb (10.10.11.105)
Host is up (0.024s latency).
Not shown: 998 closed ports
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 7.6p1 Ubuntu 4ubuntu0.5 (Ubuntu Linux; protocol 2.0)
- Possible username enum
80/tcp open  http    nginx 1.14.0 (Ubuntu)
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

# NIKTO
- No results

# GOBUSTER DIR
- No results

# GOBUSTER VHOST
- Found api-prod.horizontall.htb

# GOBUSTER DIR (API-PROD)
/reviews
/usrs
/admin
- strapi 3.0.0-beta.17.4?
- Authenticated RCE via /admin/plugins/install/?
	- https://snyk.io/vuln/SNYK-JS-STRAPI-536641
- SQLI?

# SEARCHSPLOIT
- 50239 RCE
	- admin@horizontall.htb
	- admin:SuperStrongPassword1
	- eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MywiaXNBZG1pbiI6dHJ1ZSwiaWF0IjoxNjMzMDI5MzY4LCJleHAiOjE2MzU2MjEzNjh9.a9eekDEJBbpqmq7g4m048wZPWqDTr9iJUB9V31icrK8

