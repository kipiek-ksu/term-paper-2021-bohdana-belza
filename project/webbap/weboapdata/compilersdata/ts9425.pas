program z1;
var a:array[1..100] of real;
i,n:integer;
min:real;
begin
readln(n);
for i:=1 to n do
read(a[i]);
min:=a[1];
for i:=2 to n do
if a[i]<min then min:=a[i];
write(min1:3);
end.