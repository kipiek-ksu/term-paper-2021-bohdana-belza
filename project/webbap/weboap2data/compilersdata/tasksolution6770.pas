var a:array[1..100,1..100] of longint; det, n,i,j:integer;
begin
readln(n);
for j:=1 to n do
begin
read(a[1,j]);
end;
for j:=1 to n do
a[2,j]:=a[1,j]*a[1,j];
for i:=3 to n do
for j:=1 to n do
a[i,j]:=a[1,j]*a[i-1,j];
det:=a[n,n]-a[n-1,n];
write(det);
end.
