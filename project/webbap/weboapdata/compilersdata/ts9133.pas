program L7z10;
var x,y:integer;
function nod (m,n:integer):integer;
begin
if m<>0 then nod:=m mod n else nod:=m;
end;
begin
read(x,y);
write(nod(x,y));
end.