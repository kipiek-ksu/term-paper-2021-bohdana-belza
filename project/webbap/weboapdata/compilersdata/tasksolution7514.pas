program L4z97;
var a,b,c,min,l,d,k:integer;r:real;
begin
read(a,b,c);
min:=a;
if c<min then min:=c;
k:=min;min:=a;
if b<min then min:=b;
l:=min;min:=b;
if c<min then min:=c;
d:=min;
r:=(k-l)/(5+d);
write(r:2:2);
end.
