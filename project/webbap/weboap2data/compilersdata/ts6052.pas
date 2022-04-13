program fact;
var s,k,n: longint; 
begin;
k:=1; s:=1;
readln(n);
while k<=n do begin
s:=s*k;
k:=k+1;
end;
writeln(s);
end