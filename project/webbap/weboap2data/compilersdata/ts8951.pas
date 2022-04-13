program ex_5;
var a:array[1..100] of real;
    i,n:integer;
    m:real;
begin
readln(n);
for i:=1 to n do
readln(a[i]);
m:=a[1];
for i:=2 to n do
if m>a[i] then m:=a[i];
write(m:0:3);
end.