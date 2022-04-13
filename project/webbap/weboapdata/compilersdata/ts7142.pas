program p3;
var x,k,i: integer;
begin
read(x);
for i:= 1 to trunc (x/2) do begin
if x mod i<> 0 then k:= 1 else
if x mod i= 0 then k:=0 else k:=-1; end;
write (k);
end.