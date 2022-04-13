program p6_t5;
const m=50;
type Matrix = array [1..m, 1..m] of real;
var a: Matrix;
    n,i,j: Integer;

begin
 read(n);
 for i:=1 to n do
   for j:=1 to n do
    If i<j then a[i,j]:=sin(i+j)
       else If i=j then a[i,j]:=1
            else a[i,j]:=sin((i+j)/(2*i+3*j));
 for i:=1 to n do
 begin
   for j:=1 to n do write(a[i,j]:4:2,' ');
   writeln;
 end;
end.