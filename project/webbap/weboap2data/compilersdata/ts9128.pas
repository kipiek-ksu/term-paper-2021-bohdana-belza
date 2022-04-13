program lin_7;
var x,y,z,a,b:real;
begin
read(x);
read(y);
read(z);
a:=(1+sqr(sin(x+y)))/(2+abs(x-(2*x)/(1+sqr(x*y))))+x;
b:=(sqr(cos(arctan(1/z))));
write(a:0:3,' ',b:0:3);
end.
