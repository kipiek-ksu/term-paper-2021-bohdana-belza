program lab1_20;
var a,b,c,d,m,n,p:integer;
begin
read(a,b,c,d);
p:=a*b*c*d;
m:=(p mod 100) div 10;
n:=p mod 10;
write(m,n);
end.