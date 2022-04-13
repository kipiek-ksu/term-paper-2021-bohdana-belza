program z29;
uses crt;
var n,q,z:integer;
begin
clrscr;
readln(n);
q:=n mod 10;
z:=sqr(q) mod 10;
writeln(z);
end.