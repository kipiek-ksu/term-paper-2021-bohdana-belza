program b1;
const p=3.1415926;
l=p/3;
n=p/12;
var a,b,c,r,g,s:real;
begin
read(r);
a:=2*r*sin(n);
b:=2*r*sin(l);
c:=2*r*sin(p-n-l);
g:=(a+b+c)/2;
s:=sqrt(g*(g-a)*(g-b)*(g-c));
write(s:1:30;
END.