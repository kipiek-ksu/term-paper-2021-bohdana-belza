program pr4z19;
var x,y,z:real;
begin
read(x,y,z);
if (x > y+z) or (y> x+z) or ( z > x+y) then
write('NO')
else
write('YES');
end.