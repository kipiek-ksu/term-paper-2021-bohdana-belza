program z3;
uses crt;
var x,y,z,r:integer;
begin
clrscr;
write('x=');readln(x);
write('y=');readln(y);
write('z=');readln(z);
r:=x;
if (y>x) and (y>z) then r:=y else if (z>x) and (z>y) then r:=z;
writeln(r);
readln;
end.