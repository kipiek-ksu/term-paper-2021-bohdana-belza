program p1;
var t:integer;
begin
read(t);
if t<=0 then write(1)
else if (t>0) and (t<100) then write(2)
else if t>=100 then write(3);
end.