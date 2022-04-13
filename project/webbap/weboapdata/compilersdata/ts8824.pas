program lab_3_40;
var x,y,a: integer;
    r: real;
    begin
read (x,y,a);
if (x<y) or (x<a) then r:=(x+y+a)/3;
write (r,y,a) else write (x,y,a);
if (y<x) or (y<a) then r:=(x+y+a)/3;
write (x,r,a) else write (x,y,a)r
if (a<x) or (a<y) then r:=(x+y+a)/3;
write (x,y,r) else write (x,y,a)r
end.