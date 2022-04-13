program p6_t10;
const m=50;
type Matrix = array [1..m, 1..m] of real;
var a: Matrix;
    n,i,j,S: Integer;

begin
 read(n);
 S:=0;
 for i:=1 to n do
   for j:=1 to n do
    a[i,j]:=sin(i+j/2);
 for i:=1 to n do
  for j:=1 to n do
      If a[i,j]>0 then inc(S);
write(S);
end.