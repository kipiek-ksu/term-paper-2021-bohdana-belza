program p31;
var a,b,c,d:integer; y,x,h,f: real;
begin
read(a,b,c,d,h);
x:=a;
repeat
y:=c;
repeat
f:= 1/(x+sqrt(y));
y:=y+h;
writeln(f:3:4);
until y>d
x:=x+h;
until x>b
end.