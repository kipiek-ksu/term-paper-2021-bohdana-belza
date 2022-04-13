Program pr23;
Var z, p:real;
begin
read(z);
   if z<=17 then
     p:=0 else
   if (z<85) then
     p:=0.1*z else
   if z>=85 then
     p:=0.15*(z-85)+68;
writeln(p:0:2);
end.