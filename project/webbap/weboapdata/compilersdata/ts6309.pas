program z1;
var a,b,c:longint;
function f(n,m:longint):longint;
begin
if n=m then f:=n
if n>m then f:=f(n-m,m);
if n<m then f:=f(n,n-m);
end;
begin
readln(a,b);
c:=f(a,b);
writeln(c);
end.