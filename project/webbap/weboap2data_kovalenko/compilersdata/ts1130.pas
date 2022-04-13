Program Z4;
uses crt;
var r, x, y, z:integer;
begin
clrscr;
write ('x=');readln(x);
write ('y=');readln(y);
write ('z=');readln(z);
r:=x;
if x>y then r:=y ;
if z<r then r:=z;
writeln('Minimalne - ',r);
readln
end.