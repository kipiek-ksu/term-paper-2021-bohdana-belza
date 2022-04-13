program h;
var x,a:real;
begin
readln(x);
a:=(x*abs(x-3)+sqr(x)-9)/(2*x*x*x-3*sqr(x)-9*x);
writeln('a=',a:5:2);
end