program z1;
var a,b:array[1..50] of real;
    c:array[1..50,1..50]of real;
    i,j:integer;
begin
for i:=1 to 10 do
 read(a[i]);
for J:=1 to 20 do
 read(b[j]);
for i:=1 to 20 do
 for j:=1 to 10 do
 c[i,j]:=a[j]/(1+abs(b[i]));
for i:=1 to 20 do begin
 for j:=1 to 10 do
  write(c[i,j]:0:2 ,' ');
  writeln;
 end;
end.