program p31;
var a,b:integer; x,h,f: real;
begin
read(a,b,h);
x:=a;
repeat
f:= exp(-x)*ln(x);
x:=x+h;
writeln(f:3:4);
until x>b
end.