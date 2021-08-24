Nmap scan report for 10.10.11.100
Host is up (0.037s latency).
Not shown: 998 closed ports
PORT   STATE SERVICE VERSION
22/tcp open  ssh     OpenSSH 8.2p1 Ubuntu 4ubuntu0.2 (Ubuntu Linux; protocol 2.0)
80/tcp open  http    Apache httpd 2.4.41 ((Ubuntu))
http-server-header: Apache/2.4.41 (Ubuntu)
http-title: Bounty Hunters
- Apache 2.4.41
- Bootstrap 4.5.3
- jQuery 3.5.1 
/resources/README.txt:
- May be test account, unhashed passwords, and nopass.
- Tracker submit script not connected to DB
/resources/bountylog.js:
- tracker_diRbPr00f314.php
	- Data set is `data={}`, with `{}` in the following format (url and b64):
```
<?xml  version="1.0" encoding="ISO-8859-1"?>
		<bugreport>
		<title>title</title>
		<cwe>cwe</cwe>
		<cvss>cvss</cvss>
		<reward>reward</reward>
		</bugreport>
```
- XML XXE?

/db.php:
- Empty, but very interesting.
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel
