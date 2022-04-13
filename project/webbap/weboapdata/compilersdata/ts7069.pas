Program  zad1;
Var
I,j,Sum: integer;
a: array[1..n, 1..n] of Real;
Begin
Read(n);
For  i:=1 to n do
For j:=1 to n do
a[I,j]:=sin(i+j/2);
sum:=0;
For  i:=1 to n do
For j:=1 to n do
Begin
If a[I,j]>0
Then
Sum:=Sum+1;
End;
Writeln(Sum);
End.