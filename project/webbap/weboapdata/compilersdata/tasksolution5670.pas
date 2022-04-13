program z3_2;
var a,b:integer;
function f(a,b:real):real;
begin
 f:=2*a+3*b-10;
end;
begin
  read(a,b);
  write(f(a,b):4:3);
end.