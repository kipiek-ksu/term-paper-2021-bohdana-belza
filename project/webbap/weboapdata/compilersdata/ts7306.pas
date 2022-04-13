Program l_2_6;
var x,y,z:real;
    a,b:real;
begin
read (x,y,z);
a:=(2*cos(x-3.14/6))/(1/2+sqr(sin(y)));
b:=1+sqr(z)/(3+sqr(z)/5);
write(a:0:3,' ',b:0:3);
end.