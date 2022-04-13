program z1;
var i,n,m,s:integer;
begin
read(n,m);
s:=0;
for i:=n to m do begin
s:=s+i;
end;
write(s);
end.