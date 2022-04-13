program r_23;
var z,p:real;
begin
 read(z);
  if z<=17 thenp:=0 else
  if (z<85) and (z>17) then p:=0.17*z else
  p:=0.15*(z-85)+6.8*z;
 write(p:0:2);
end.