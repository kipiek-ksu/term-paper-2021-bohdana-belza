program L_4_93;
var x,y,k,l: integer;r:boolean;
begin
read (x,y,k,l);
if y=k*x+l then r:=true
           else r:=false;
if r then write (yes)
     else write (no);
end.