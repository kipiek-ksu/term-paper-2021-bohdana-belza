program rec_9;
var n,g:integer;
function g(k:integer):integer;
begin
if (k=0)or(k=1) then
g:=1
else g:=2*g(k-1)-(k-2)+1;
end;
begin
read(n);
f:=g(n);
write(f);
end.