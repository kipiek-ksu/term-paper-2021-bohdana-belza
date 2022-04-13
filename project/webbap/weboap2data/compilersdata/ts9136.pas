program z1;
var a:array[1..1000] of integer;
b:array[1..103,1..103] of integer;
i,j,n:integer;
begin
for i:=1 to 3 do
read(a[i]);
for i:=1 to 3 do
for j:=1 to 3 do
b[i,j]:=a[i]-3*j;
for i:=1 to 3 do
for j:=1 to 3 do
if j mod 3=0 then writeln (b[i,j])
else write(b[i,j]);
end.

