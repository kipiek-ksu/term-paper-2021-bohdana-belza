program P_2_6;
const Pi=3.14;
var x,y,z,a,b:real;
begin
read (x,y,z);
a:= (2*cos (x - (Pi/6))) / (0.5 + sqr(sin (y)));
b:= 1 + (sqr(z) / (3 + sqr(z)/5));
write ('a=', a:4:3, ' ', 'b=', b:4:3);
end.