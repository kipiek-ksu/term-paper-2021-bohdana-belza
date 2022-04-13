program p3;
const pi=3.1416; l=pi/3; n=pi/12;
var a,b,c,r,p,s: real;
begin
read(r);
a:=2*r*sin(n);
b:=2*r*sin(l);
c:=2*r*sin(pi-n-l);
p:= (a+b+c)/2;
s:= sqrt(p*(p-a)*(p-b)*(p-c));
write (s:3:3);
end.