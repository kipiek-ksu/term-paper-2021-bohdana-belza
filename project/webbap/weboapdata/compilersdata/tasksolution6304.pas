program p7_t20;
var a,b,eps:Real;

begin
 read(a,b,eps);
 While a<>b do
 begin
  writeln(ln(a+sqrt(a)):4:4);
  a:=a+eps;
 end;
end.