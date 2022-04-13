Program _06_11;
const
     m=100;
var
   A:array[1..m,1..m] of real;
   n:integer;
   i,j:integer;
   sum:integer;
begin
     read(n);
     for i:=1 to n do
     for j:=1 to n do
         A[i,j]:=cos(sqr(i)+n);
     sum:=0;
     for i:=1 to n do
     for j:=1 to n do
         if A[i,j]>0 then
            sum:=sum+1;
     write(sum)
end.