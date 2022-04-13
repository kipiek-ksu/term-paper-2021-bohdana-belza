Program z19;
var c,n:longint;
function teen(n:longint):longint;
begin
  if (n=0) or (n=1) then teen:=1
  else teen:=2*teen(n-1)-(n-3);
end;
begin
  read(n);
  c:=teen(n);
  write(c);
end.