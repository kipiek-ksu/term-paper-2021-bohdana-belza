program LAB_8_20;
var n,a:integer;
function f(n:integer):integer;
begin
if n=1 then f:=1
else
begin
n:=n div 2;
f:=f(n+2)-2*f(n+1);
end;end;
begin
write(n);
repeat
read(n);
until (n>0) and (n<31);
a:=f(n);
write(a);
end.