program z1;
var m:set of char;
s:string;
n,i,z:integer;
begin
m:=['a','e','i','o','u','y','A','E','I','O','U','Y'];
z:=0;
readln(s);
n:=length(s);
for i:=1 to n do
if not(s[i] in m) then z:=i+z;
write(z);
end.