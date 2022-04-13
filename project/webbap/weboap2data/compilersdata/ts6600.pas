function gsd (n,m:byte):longint;
begin
if n=m then gsd:=n else
   if n>m then gsd:=gsd(n-m,m) else
      if n<m then gsd:=gsd(n,n-m);
end;
