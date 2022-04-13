program L2z10;
var x,a:real;
begin
read(x);
a:=(x*abs(x-3)+sqr(x)-9)/(2*sqr(x)*x-3*sqr(x)-9*x);
write(a);
end.