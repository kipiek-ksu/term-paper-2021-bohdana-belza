program LAB_8_2;
function f(n:longint):byte;
begin
if n<10 then f:=n
else if n mod 10>f(n div 10)
then f:=n mod 10
else f:=f(n div 10);
end;
var n:longint;
begin
read(n);
write(f(n));
end.