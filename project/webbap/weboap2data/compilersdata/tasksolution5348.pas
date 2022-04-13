program p5;
var x,y,z,a,b:real;
begin
readln(x,y,z);
a:=y+x/(sqr(y)+abs(sqr(x)/(y+(x*x*x)/3)));
b:=1+sqr(sin(z/2))/sqr(cos(z/2));
writeln(a:5:3,'  ',b:5:3);
end.