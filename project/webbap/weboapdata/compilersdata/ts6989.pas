program Z7;
var A,R1,R2,b,c,d,f,g,l:integer;
begin
read(a);
b:=a mod 10;
c:=a div 1000;
d:=a div 10;
f:=d mod 10;
g:=a div 100;
l:=g mod 10;
R1:=b+c;
R2:=f+l;
write(R1);
write(R2);
end