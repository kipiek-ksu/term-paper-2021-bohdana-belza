Program z1;
var x, y, z:real;
begin
Readln(x, y, z);
a:=(1+y)*((x+y)/(sqr(x)+4))/(exp(-x-2)+1/(sqr(x+4))));
b:=(1+cos(y-2))/(sqr(x)*sqr(x)/2+sqr(sin(2)));
writeln(a:0:2);
writeln(b:0:9);
end.
