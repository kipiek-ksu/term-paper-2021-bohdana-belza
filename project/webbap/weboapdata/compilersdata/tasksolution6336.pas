var i,k,n:longint;
begin
readln(n);
k:=67108863;
i:=1;
while n>26 do begin
k:=trunc((k-1)/2);
if n-i>k then n:=n-k;i:=i+1;end;
writeln(chr(123-n));
end.