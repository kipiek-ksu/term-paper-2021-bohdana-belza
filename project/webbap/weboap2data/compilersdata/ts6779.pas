program z1;
var  a:array[1..50,1..50] of real; i,j,k,n:integer;
begin
readln(n);
for i:=1 to n do
for j:=1 to n do
readln(a[i,j]);
K:=0;
for i:=1 to n do
begin
k:=k+1;
for j:=k to n do
begin
a[i,j]:=0;
end;
end;
for i:=1 to n do
begin
writeln;
for j:=1 to n do
write(' ',a[i,j]:0:1);
end;
end.