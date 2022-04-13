program z1;
var a:array[1..103,1..103] of real;
i,j,n,s:integer;
begin
readln(n);
for i:=1 to n do
for j:=2 to n+1 do begin
a[i,j]:=cos(sqr(i)+n);
if a[i,j]>0 then s:=s+1;
end;
write(s);
end.

