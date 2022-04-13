var i,a:integer; f:longint;
begin
f:=1;
read(a);
if (a>=1) and (a<=25) then
for i:=1 to a do f:=f*i;
write(f);
end.