program faktorial;
var n,s,k: double;
begin
readln(n);
s:=1; k:=1;
while k<n do
begin
k:=k+1;
s:=s*k;
end;
writeln(s);
end.
