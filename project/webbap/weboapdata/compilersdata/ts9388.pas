program z2;
var m:integer; n:longint;
function sym(n1:longint):integer;
begin
if n1=0 then sym:=0
else sym:=sym(n1 div 10)+(n1 mod 10);
end;
begin
read(n);
if n>0 then
m:=sym(n);
write(m);
end.