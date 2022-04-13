program z9;
var n,k,p:integer;
begin
  read(n);
  p:=length(n);
  while k<>n do
begin
  k:=1+n[p];
  p:=p-1;
end;
  write(k);
end.