program lab_4_40;
var x,y,a,r: real;
begin
read (x,y,a);
r:=(x+y+a)/3;
if (x<y) and (x<a) then x:=r;
if (y<x) and (y<a) then y:=r else
if (a<x) and (a<y) then a:=r;
write (x:0:2,' ', y:0:2,' ', a:0:2);
end.