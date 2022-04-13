program L_2_1;
var y,x,r:real;
begin
read(x,y);
r:=(abs(x)-abs(y))/(1+abs(x*y));
write(r:0:3);
end.