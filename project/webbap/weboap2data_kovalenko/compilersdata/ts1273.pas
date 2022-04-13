program z5;
var x,y,z,r:integer;
begin
read(x,y,z);
if(x+y+z)>(x*y*z)
then r:=x+y+z;
else r:=x*y*z;
writeln(r);
end.