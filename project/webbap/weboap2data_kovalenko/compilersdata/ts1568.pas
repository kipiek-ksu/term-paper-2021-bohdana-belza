program_7;
var
  x,y,z:real;
  R:boolean;
begin
   read(x,y,z);
   if (x<y) and (y<z) then
     R:=true
   else
     R:=false;
   if R then
     write('true')
   else
     write('false');
end.
