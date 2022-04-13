Program pr13;
Var A, R1, R2, x, y, z: integer;
begin
read(A);
z:=A mod 10;
A:=A div 10;
y:=A mod 10;
A:=A div 10;
x:=A;
R1:= y;
R2:=z+x;
writeln(R1,, R2);
end.
