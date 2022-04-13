Program z13;
var c,m,n:longint;
function akker(n,m:longint):longint;
begin
  if n=0 then akker:=m+1
  else if (n<>0) and (m=0) then akker:=akker(n-1,1)
  else if (m>0) and (n>0) then akker:=akker(n-1,akker(n,m-1));
end;
begin
  read(n,m);
  c:=akker(n,m);
  write(c);
end.