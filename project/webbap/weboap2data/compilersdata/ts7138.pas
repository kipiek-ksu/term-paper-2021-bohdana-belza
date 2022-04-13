program p1;
var x,y,z,x1,y1,z1:integer;
begin
read(x);
read(y);
read(z);
if (x>=y) and (y>=z) then
begin
x1:=2*x;
y1:=2*y;
z1:=2*z;
end
else
begin
x1:=abs(x);
y1:=abs(y);
z1:=abs(z);
end;
write(x1,y1,z1);
end.