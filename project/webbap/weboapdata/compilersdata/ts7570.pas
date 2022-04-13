Program Potiag;
var a,b,s:integer;;v1,v2,x:real;
begin
read(a,b,s);
x:=s/a;
v1:=a*x/2;
v2:=b*x/2;
write(v1:6:3, ' ' ,v2:6:3);
end.