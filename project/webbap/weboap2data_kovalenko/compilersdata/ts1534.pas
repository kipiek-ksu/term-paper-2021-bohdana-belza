program weboap;
var a, b, h:real;
x:real;
begin
read(a, b, h);
x:=a;
write(1/x:6:4);
x:=a+h;
while x<b do
begin
write(' ',1/x:6:4);
x:=x+h;
end
end.