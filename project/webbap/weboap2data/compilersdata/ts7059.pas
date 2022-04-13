Program  zad1;
Var 
x, y, z, x1, y1, z1: integer;
Begin
Read(x);
Read(y);
Read(z);
If  x>=y  and y>=z then
begin
x1:=2*x;
y1:=2*y;
z1:=2*z;
end;
else
begin
x1:=abs(x);
y2:=abs(y);
z3:=abs(z);
end;
write(x1, y1, z1);
end.
