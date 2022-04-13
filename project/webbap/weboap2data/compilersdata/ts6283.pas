var p,z:real;
begin
  read(z);
    if z<=17 then p:=0;
    if (z>17) and (z<85) then
      p:=0.1*z;
    if z>=85 then
      p:=(z-85)*0.15+6.8;
  write(p:5:2);
end.