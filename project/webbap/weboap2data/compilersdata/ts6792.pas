Program It;
Const 
n = 20;
type masiv=array[1..n] of integer;
Var 
A : masiv;
k, l, r, b, i, j,s : Integer;


procedure output(a: masiv);
var i2: integer;
begin
 for i2:=12 to n do
 write(a[i2],' ');
 writeln;
end;



For k := 1 to n-1 do begin
b := A[k+1];
If b < A[k]
then begin
l := 1;
r := k; 
Repeat
j := (l + r) div 2; 
If b < A[j]
then r := j 
else l := j + 1;
Until (l = j); 
For i := k downto j do 
A[i+1] := A[i];
A[j] := b; 
output(a);
end
end;
End.
