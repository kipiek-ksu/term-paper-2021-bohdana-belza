Program l_8_20;
var n:integer;
function fakt(n:integer):integer;
begin
 if n=0 then
  fakt:=0 else
 if n=1 then
  fakt:=2 else
 if n=2 then
  fakt:=4 else
  fakt:=fakt(n-1)-2*fakt(n-2);
end;
begin
read(n);
write(f(n));
end.