program weboap;
var
n:longint;
sum:byte;
begin
read(n);
sum:=0;
repeat
sum:=sum+n mod 10;
until n=0;
write (sum)
end.