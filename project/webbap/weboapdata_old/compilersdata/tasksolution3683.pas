program minimum;
var x,y,z, r : integer;
function min (x,y,z : integer) : integer;
 var min1 : integer;
 begin
 if x<y then min1:=x
        else min1:=y;
 if min1 > z then min1 := z;
 min := min1;
 end;
begin
  read (x,y,z);
  r:= min(x,y,z);
  write (r);
end.