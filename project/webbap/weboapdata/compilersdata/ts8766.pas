program p7;
const k=7;
var a:array [1..100,1..k] of real;
i,n,j: integer;
begin
read(n);
if n= 1 then begin
for j:= 1 to k do
 a[1,j]:=2*j+3;end elde
if n= 2 then 
for j:= 1 to k do begin
a[2,j]:= j-3/(2+1/j); end else
if n>2 then begin
for i:=3 to n do 
a[i,j]:= a[i-2,j]+a[i-1,j]; end;
for i:= 1 to n do
for j:= 1 to k do
write (a[i,j]:3:1,' ');
end.