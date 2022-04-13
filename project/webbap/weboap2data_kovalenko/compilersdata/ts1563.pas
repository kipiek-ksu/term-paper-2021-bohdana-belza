program zad6_10;
var
   n,i,j,sum:integer;
   a:array[1..255,1..255]of real;
begin
readln(n);
sum:=0;
for I:=1 to n do
for j:=1 to n do
begin
a[i,j]:=sin(i+j/2);
if a[i,j]>=0 then sum:=sum+1;
end;
write(sum);
end