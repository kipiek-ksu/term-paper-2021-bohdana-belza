Program af;
var A:array[1..100] of integer;
b,k,i,n,:real;
begin
k := 0;
repeat
  k := k + 1;
until A[k] > 0;
b := A[k]; 
writeln(b);
end. 