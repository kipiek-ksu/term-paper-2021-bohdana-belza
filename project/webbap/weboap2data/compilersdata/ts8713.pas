program tema6_3;
var a:array[1..100,1..100] of integer;
    n,m,j,i:integer;
begin
read(n,m);
for i:=1 to n do
for j:=1 to m do
a[i,j]:=i+2*j;
for i:=1 to n do
for j:=1 to m do
if j<>m then write(a[i,j],' ')
else writeln(a[i,j]);
end.