program P_2;
var a,b,c,d,t,l,k,i,x:integer;
begin
read (a);
c:=a mod 10;
d:=a div 100;
t:=d mod 10;
l:=a div 100;
k:=l div 10;
i:=a mod 100;
x:=i div 10;
b:=k*1000+c*100+x*10+t;
write (b);
end.