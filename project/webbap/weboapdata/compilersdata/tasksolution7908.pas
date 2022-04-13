program l15;
var f,x,a,b,h: real;
i,n: integer;
begin
read(a);
read(b);
read(h);
n:=round((b-a)/h);
x:=a;
for i:=1 to n do begin
f:=cos(x)+3;
x:=x+h;
write(f:8:4);
end,
end.