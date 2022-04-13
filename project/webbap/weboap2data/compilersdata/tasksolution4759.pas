program L3_p7;
var a,b,r:integer;
procedure chis(x,y:integer; var z:integer);
begin
  if x>y then z:=x;
  if x<y then z:=y;
  if x=y then z:=0;
end;
begin
  readln(a,b);
  chis(a,b,r);
  write(r);
end.