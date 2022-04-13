program l6_z12;
uses crt;
var a:array[1..100,1..100] of real; i,j,n,sum:integer;
begin
clrscr;
read(n);
for i:=1 to n do
for j:=1 to n do
a[i,j]:=sin((sqr(i)-sqr(j))/n);
sum:=0;
for i:=1 to n do
for j:=1 to n do
if a[i,j]>0 then sum:=sum+1;
write(sum);
end.