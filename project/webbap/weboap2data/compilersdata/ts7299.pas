program E10;
var x,a:real;
begin
read(x);
a:=(x*Abs(x-3)+sqr(x)-9)/(2*sqr(x)*x-3*sqr(x)-9*x);
write(a:0:4);
end.