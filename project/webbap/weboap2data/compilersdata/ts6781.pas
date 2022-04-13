program t13;
var a,b,h: real;

begin
 read(a,b,h);
 while a<b do
 begin
  writeln(exp(-a+sqrt(a)):0:4);
  a:=a+h;
 end;
end.