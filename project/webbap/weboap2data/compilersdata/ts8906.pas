program z1;
var a:array[1..100,1..100] of real;
i,n,m,j:integer;
max:real;
begin
readln(n,m);
for i:=1 to n do
for j:=1 to m do
read(a[i,j]);
max:=abs(a[1,1]);
for i:=1 to n do
for j:=1 to m do
if abs(a[i,j])>max then max:=abs(a[i,j]);
for i:=1 to n do
for j:=1 to m do
a[i,j]:=a[i,j]/max;
for i:=1 to n do begin
for j:=1 to m do
write(a[i,j]:1:1,' ');

writeln;
end;
end.