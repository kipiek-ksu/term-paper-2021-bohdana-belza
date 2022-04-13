program z1;
var a,b,z:array[1..100] of real;
x,e:real;
i,j,n,m,max1,max2:integer;
function po(z:real;y,max:integer):real;
begin
if max>y then z:=0.55;
po:=z;
end;
begin
readln(n,m);
for i:=1 to n do
read(a[i]);
for j:=1 to m do
read(b[j]);
max1:=1;
for i:=1 to n do
if a[max1]<a[i] then max1:=i;
max2:=1;
for j:=2 to m do
if b[max2]<b[j] then max2:=j;
for i:=1 to n do
begin
x:=a[i];
a[i]:=po(x,max1,i);
end;
for j:=1 to m do
begin
e:=b[j];
b[j]:=po(e,max2,j);
end;
for i:=1 to n do
if i=n then writeln(a[i]:1:2) else write(a[i]:1:2,' ');
for j:=1 to m do
if j=m then write(b[j]:1:2) else write(b[j]:1:2,' ');
end.