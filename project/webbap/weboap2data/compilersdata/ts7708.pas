program T3z25
var u,v,a,b:real;
    r:real;
function min(a,b:real):real;
begin
min:=a;
if a>b then min:=b;
end;
begin
read(a,b);
u:=min(a,b);
v:=min(a*b,a+b);
r:=min(u+sqr(v),3.14);
write(r:0:3);
end.