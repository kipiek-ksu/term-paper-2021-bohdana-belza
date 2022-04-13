Program l_6_5;
const k=50;
var k,i,j:integer;a:array[1..k,1..k] of real;
begin
read(n);
for i:=1 to n do
for j:=1 to n do
a[i,j]:=0;
for i:=1 to n do begin
for j:=1 to n do begin
if i<j then a[i,j]:=sin(i+j);
if i=j then a[i,j]:=1 else a[i,j]:=sin((i+j)/(2*i+3*j));
write(a[i,j]:2:2,' ');end;end;
end.