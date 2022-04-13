program tema6_5;
var a:array[1..100,1..100] of real;
    n,j,i:integer;
begin
read(n);
for i:=1 to n do
for j:=1 to n do
if (i<j) then a[i,j]:=sin(i+j)
else if i=j then a[i,j]:=1
else a[i,j]:=sin((i+j)/(2*i+3*j));
for i:=1 to n do
for j:=1 to n do
if j<>n then write(a[i,j]:0:2,' ')
else writeln(a[i,j]:0:2);
end.