program l_4_19;
var x,y,z:real;r:string[3];
begin
read(x,y,z);
if (x+z>y) or (x+y>z) or (y+z>x) then r:='Yes' else r:='No';
write(r);
end.