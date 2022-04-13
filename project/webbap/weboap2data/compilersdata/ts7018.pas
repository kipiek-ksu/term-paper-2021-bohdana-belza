
program b1;
  var x1,y1,x2,y2,x3,y3:integer;
   a,b:real;
 begin
read(x1,y1,x2,y2,x3,y3);
a:=sqrt(sqr(x2-x1)+sqr(y2-y1));
b:=sqrt(sqr(x3-x1)+sqr(y3-y1));
S:=(a*b)/2;
write(s:2:2);
end.