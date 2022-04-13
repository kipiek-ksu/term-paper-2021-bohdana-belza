program pr1;
var x1,y1,x2,y2,x3,y3,d:real;
begin
read(x1,y1,x2,y2,x3,y3);
d:=abs((x3*(y1-y2)-x2(y1-y2)-y3*(x1-x2)+y2(x1-x2))/sqrt(sqr(y1-y2)+sqr(x1-x2)));
write(d:8:2);
end.
