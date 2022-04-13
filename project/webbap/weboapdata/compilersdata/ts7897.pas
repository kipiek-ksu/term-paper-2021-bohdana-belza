program l13;
var x,a,b,h,f: real;
n,i: integer;
begin
read(a);
read(b);
read(h);
n:=round((b-a)/h);
x:=a;
for i:=1 to n do begin
f:=x*x-3;
x:=x+h;
write(f:9:4);
end;
end.