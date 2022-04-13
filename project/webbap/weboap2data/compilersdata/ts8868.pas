program lab_6_22;
var a:array[1..100,1..100]of longint;
d,n,i,j:integer;
begin
read(n);
for i:=1 to n do
begin
read(a[i,j]);
end;
for j:=1 to n do
a[2,j]:=a[1,j]*a[1,j];
for j:=3 to n do
for j:=1 to n do
a[i,j]:=a[1,j]*a[i-1,j];
d:=a[n,n]-a[n-1,n];
write(d);
end.