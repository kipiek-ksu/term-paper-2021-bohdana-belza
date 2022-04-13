program l2z3;
var a,b,x,y,z:real;
begin
  readln(x,y,z);
  a:=(3+exp(y-1))/(1+(sqr(x)*abs(y-sin(z)/cos(z))));
  b:=1+abs(y-x)+sqr(y-x)/2+exp(3*ln(abs(y-x)))/3;
  writeln(a:0:2,' ',b:0:2);
end.