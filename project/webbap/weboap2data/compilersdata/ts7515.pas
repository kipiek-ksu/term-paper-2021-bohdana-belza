program Lab_3_2;
var a,b: real;

function f(a,b: real): real;
begin
 f:=2*a+3*b-10;
end;

begin
 read(a,b);
 write(f(a,b):0:3);
end.