program z1;
var n,i,k,m,d,j,s:longint;
begin
read(n);
a:=n div 100;
b:=n div 10 mod 10;
c:=n mod 10;
m:=c*100+b*10+a;
write(m);
end.