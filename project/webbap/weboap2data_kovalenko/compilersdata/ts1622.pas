program zamena;
var x,y,m:integer;
begin
  read(x,y,m);
  if x<>y then
    if x>y then x:=m
    else y:=m
  else y:=m;
  write(x,,y);
end.