program z_19;
var i,a,n,k1:integer;k:longint;
begin
read(a,n);
k:=a;k1:=n;
for i:=2 to n do k1:=k1*n;
for i:=2 to k1 do k:=k*a;
write(k);
end.