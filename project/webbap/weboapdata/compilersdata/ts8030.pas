program p4;
var x,y,z,r,min: integer;
begin
read(x,y,z);
min:=x+y+z;
if x*y*z< min then min:=x*y*z;
r:=sqr(min)+1;
write(r);
end.