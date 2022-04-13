program p5;
type
 mas=array [1..100] of real;
var n,i:integer; a:mas;k:real;
function min( a: mas; i:integer):real;
begin
if i=n then min:=k
else begin
if a[i]<k then k:= a[i];
min:= min(a,i+1);
end;
end;
begin
read(n);
for i:=1 to n do
read(a[i]);
k:= a[1];
write(min(a,1):0:0);
end.