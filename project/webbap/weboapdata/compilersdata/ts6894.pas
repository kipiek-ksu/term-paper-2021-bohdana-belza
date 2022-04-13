program p3;
var x,y,a: integer;
begin
read(x,y);
if (x>0)and(y>0) then a:=1 else
if (x>0)and(y<0) then a:=4 else
if (x<0)and(y>0) then a:=2 else a:=3;
write(a);
end.