program L_8_18;
var n : integer;
function f(n : integer) : longint;
begin
if n = 0
then f := 1
else
if n = 1
then f := 2
else f := 2 * f(n - 1) - n + 2;
end;
begin
read(n);
write(f(n));
end.
