program L_2_13;
var a,z:real;
const pi=3.14;
begin
readln(a);
a:=pi/180*a;
z:=(1-cos(2*a))*cos(pi/180*45+2*a)/(2*sqr(sin(2*a))-sin(4*a));
writeln(z:8:4);
end.
