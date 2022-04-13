Program maxsimum;
function MaxF(N:longint):byte;
begin
if (n<10) then (MaxF:=n)
else if n mod 10>MaxF
then MaxF:=n mod 10
else MaxF:=MaxF(n div 10);
end;
var N:longint;
begin
read(N);
write(Max(N));
end.
