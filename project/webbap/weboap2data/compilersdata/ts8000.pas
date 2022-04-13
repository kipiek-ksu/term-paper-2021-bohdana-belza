program mass_7;
var A:array[1..50,1..50]of real;
B:array[1..50]of real;
i,j,n,m:integer;
begin
read(n);
read(m);
for i:=1 to n do
for j:=1 to m do
read(a[i,j]);
for i:=1 to n do begin
b[i]:=a[i,1];
for j:=2 to m do
b[i]:=b[i]+a[i,j];
write(b[i]:3:2,' ')
end
end.