program ercoder;
var m,n:real;t:byte;
begin
read(m,n);
t:=0;
while m<n do
begin
inc(t);
m:=m+m/100*20;
end;
write(t);
end