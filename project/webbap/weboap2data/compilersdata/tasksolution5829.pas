program p25;
var a,b,u,v,r:real;
function min(x,y:real):real;
begin
if x<y then
min:=x
else
if x=y then
min:=x
else
min:=y;
end;
begin
read(a,b);
u:=min(a,b);
v:=min(a*b,a+b);
r:=min(u+Sqr(v),3.14);
write(r:4:3)
end.