10.10.10.152

# NMAP
PORT    STATE SERVICE      VERSION
21/tcp  open  ftp          Microsoft ftpd
80/tcp  open  http         Indy httpd 18.1.37.13946 (Paessler PRTG bandwidth monitor)
135/tcp open  msrpc        Microsoft Windows RPC
139/tcp open  netbios-ssn  Microsoft Windows netbios-ssn
445/tcp open  microsoft-ds Microsoft Windows Server 2008 R2 - 2012 microsoft-ds
Service Info: OSs: Windows, Windows Server 2008 R2 - 2012; CPE: cpe:/o:microsoft:windows

# SERVICES:
## FTP:
- Anonymous FTP allowed (anonymous:)
- No write access, but can read
- Placed in / directory
- Access to /Users/Administrator denied, but /Users/Public OK.
- Got user.txt

### User.txt:
dd58ce67b49e15105e88096c8d9255a5

- Found config files (PRTG Configuration.dat, .old, and .old.bak)
- prtgadmin:PrTg@dmin2018
	- Valid login: `prtgadmin:PrTg@dmin2019`

## HTTP:
- PRTG Network Monitor (version 18.1.37.13946??)
	- Version confirmed after login.
public/login.htm:
- POST to login
- SQLMap:
	- `sqlmap -u http://netmon.htb/public/login.htm --method=POST --data=loginurl=&name=test&password=test -p username,password`
	- 
public/sendpassword.htm
- Possible username enum ("Sorry this account is unknown")
Gobuster Dir Mode:
/api/experiments:
- Unauthorized currently

### LOGIN VALID
- 


# SMB
Enum4linux:
- Sessions with blank uname & pw not allowed
