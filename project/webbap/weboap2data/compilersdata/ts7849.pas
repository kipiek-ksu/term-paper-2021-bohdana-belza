program K9_z1;
var  n,m:integer;
function f(n,m:integer):integer;
begin
if n=0 then f:=m+1;
if (n<>0) and (m=0) then f:=f(n-1,1);
if (n>0) and (m>0) then f:=f(n-1,f(n,m-1));
end;
begin
readln(n,m);
writeln(f(n,m));
end.