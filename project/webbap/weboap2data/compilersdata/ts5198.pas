program zadacha29;
var x1,x2,x3,y1,y2,y3,s:real;
begin
  readln(x1,y1,x2,y2,x3,y3);
  IF (x1-x2<>0) and (y1-y3<>0 and (x2-x3<>0) then
    begin
     s:=x1*(y3-y2)+x2*(y1-y3)+x3*(y2-y1);
     s:=abs(s);
     s:=s/2;
     write(s:6:2);
    end
   else Write('Wrong coordinate of points');
end.