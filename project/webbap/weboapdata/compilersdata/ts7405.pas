program l8_z10;
var n:longint;  t:byte;
function Odds(n:longint):byte;
 begin
 If n=0 then Odds:=0
 else odds:=ord(odd(n mod 10))+ odds(n div 10);
end;
begin
read(n);
t:=odds(n);
write(t);
end.