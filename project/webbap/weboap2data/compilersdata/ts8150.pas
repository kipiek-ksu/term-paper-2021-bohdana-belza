program dk;
var a,b,r:integer;
procedure maxi(c,d:integer;var  max:integer);
begin
if c>d then max:=c
else max:=d;
end;
begin
read(a);
read(b);
if a<>b then maxi(a,b.r)
else write('0');
write(r)
end.