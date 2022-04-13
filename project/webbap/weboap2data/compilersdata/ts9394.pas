PROgram t7z42;
var  x,h,a,b,y,z,c,d:real;
 function f(t,k:real):real;
begin
f:=exp(-sqr(x)-sqr(y)); end; begin
read(a,b,c,d,h);
x:=a ;
while x<=b do
begin
y:=c;
while  y<=d do
begin
z:=f(x,y);
write(z:1:4); y:=y+h; end;
x:=x+h;
end;
end.