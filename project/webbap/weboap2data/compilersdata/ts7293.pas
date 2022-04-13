program L_1_14;
var A,R1,R2,k1,k2,k3,k4:integer;
begin
read (A);
R1:=(A div 100) mod 10;
k1:= A div 10000;
k2:= (A div 1000) mod 10;
k3:= (A mod 100) div 10;
k4:= A mod 10;
R2:= k1+k2+k3+k4;
write (R1,' ',R2);
end.