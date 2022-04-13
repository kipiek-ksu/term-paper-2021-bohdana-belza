program z213;
var z,n,c,v:real; a:integer;
begin
read (a);
n:=1-cos(2*a);
c:=cos(3.14/4+2*a);
v:=(2*sqr(sin(2*a)))-sin(4*a);
z:=(n*c)/v;
writeln (z:6:4);
end.
