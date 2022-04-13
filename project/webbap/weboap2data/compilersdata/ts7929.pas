program l1.1;
var a,b,c,d,n,k : integer;
begin
read(n);
a:=n div 100;
b:=n div 10;
c:=b-10*a;
d:=n-10*b;
k:=a+d;
write(c,' ',k);
end.
