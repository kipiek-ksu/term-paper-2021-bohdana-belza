program l3;
var a,b,c,mc,p:real;
begin
read(a,b);
c:=sqrt(a*a+b*b);
mc:=sqrt((2*a*a+2*b*b-c*c)/4);
p:=4*sqrt((mc*mc)/2);
write(int(p));
end.