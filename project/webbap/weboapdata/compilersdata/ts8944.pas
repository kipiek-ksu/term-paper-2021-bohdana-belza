program l8z6;
var n:0..15;
function rek (n:integer):longint;
begin
if n=0 then rek:=1 else
if n=1 then rek:=1 else
rek:=rek(n-1)*n;
end;
begin
readln(n);
write(rek(n));
end.
