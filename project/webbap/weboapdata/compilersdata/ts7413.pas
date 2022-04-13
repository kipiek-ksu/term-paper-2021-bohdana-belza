program L_6_11;
var i,j:integer;
      a:array[1..100,1..100] of real;
    n,m:integer;
    sum:real;

begin
read(n);
m:=n;
sum:=0;
for i:=1 to n do
for j:=1 to n do
begin
a[i,j]:=cos(sqr(i)+m);
if a[i,j]>0 then
sum:=sum+1;
end;
write(sum);
end.