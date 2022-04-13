var a,i,k:integer; d,n:real;
function F(a:integer):real;
begin
F:=0;
i:=1;
d:=0;
while a<>0 do
begin
k:=a mod 10;
a:= a div 10;
d:=k*exp(ln(2)*i)+d;
i:=i+1;
end;
f:=d;
end;
begin
read(a);
n:=f(a);
n:=n/2;
write(n:0:0);
end.