program L6_17;
var a:array[1..8] of integer;
    x:array [1..8,1..8] of integer;
    i,j:integer;
begin
for i:=1 to 8 do
read(a[i]);
for i:=1 to 8 do
for j:=1 to 8 do
if i=1 then x[i,j]:=a[j]
else x[i,j]:=x[i-1,j]*a[j];
for i:=1 to 8 do
for j:=1 to 8 do
if j<>8 then write(x[i,j],' ')
else writeln(x[i,j]);
end.