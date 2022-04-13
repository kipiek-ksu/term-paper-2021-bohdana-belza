program p20;
var a,b,c,d,x,x1,x2,r:real;
begin
read(a,b,c);
if a=0 then
if b=0 then
if c=0 then
write(r)
else
write(r)
else
begin
x:=-c/b;
write(x:8:3);
end else begin
d:=b*b-4*a*c;
if d<0 then write('')
else begin
x1:=(-b+sqrt(d))/2/a;
x2:=(-b-sqrt(d))/2/a;
write(x1:8:3,x2:8:3);
end;end;end.