program Z29;
var x1,x2,x3,y1,y2,y3,s:real;
begin
 read(x1,x2,x3,y1,y2,y3);
  s:=abs(1*(x2*y3-x3*y2)-(x1*y3-x3*y1)+(x1*y1-x2*y2))/2;
    write('s=',s:2:2):
end.