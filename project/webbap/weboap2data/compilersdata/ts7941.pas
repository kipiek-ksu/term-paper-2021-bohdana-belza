program van;
var  a, b, c, x1, x2, d:real;
begin
read (a,b,c)
d:=sqr(b)-4*a*c;
if d>0 then
begin
x1:=(-b+sqrt(d))/(2*a);
x2:=(-b-sqrt(d))/(2*a);
write (x1:4:3);
write (x2:4:3);
end;
if d=0 then
begin
x1:=(-b)/(2*a);
write (x1:4:3);
end;
if d<0 then
read;
end.