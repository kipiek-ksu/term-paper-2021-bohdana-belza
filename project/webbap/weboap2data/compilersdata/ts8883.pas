program tema6_15;
var a:array [1..100] of integer;
    b:array [1..100,1..100] of integer;
    m,i,j,k:integer;
begin
read(m);
for i:=1 to m do
read(a[i]);
for i:=1 to m do
for j:=1 to m do
read(b[i,j]);
k:=0;
for i:=1 to m do
if a[i]>0 then
for j:=1 to m do
if b[i,j]<0 then k:=k+1;
write(k);
end.