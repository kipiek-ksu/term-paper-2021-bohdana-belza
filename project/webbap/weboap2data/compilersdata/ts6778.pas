program z1;
var a,b,c:array[1..50,1..50] of real; i,j,n:integer;
begin
readln(n);
for i:=1 to n do
for j:=1 to n do
readln (a[i,j]);
for i:=1 to n do
for j:=1 to n do
if j>=i then begin
b[i,j]:=a[i,j];
c[i,j]:=-a[j,i];
end
else
begin
b[i,j]:=a[j,i];
c[i,j]:=a[i,j];
end;
for i:=1 to n do
begin
writeln;
for j:=1 to n do
write(b[i,j]:0:2);
end;
for i:=1 to n do
begin
writeln;
for j:=1 to n do
write(c[i,j]:0:2);
end;
end.