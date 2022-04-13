program L_7_4;
var n,i,sum:integer;
begin
read(n);
sum:= 0;
while n <> 0 do
begin
sum:= sum + n mod 10;
n:= n div 10;
end;
write(sum);
end.