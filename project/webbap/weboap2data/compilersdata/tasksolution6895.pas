program  qwerty;
var x1,x2,y1,y2,s,a,b : real;
begin
read(x1,y1,x2,y2);
a:=abs(x2-x1);
b:=abs(y2-y1);
s:=a*b;
write(s:1:2);
end.