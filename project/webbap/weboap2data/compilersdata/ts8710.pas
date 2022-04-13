Program z4;
Var A: array[1..100,1..100] of real;
    i,j,n:integer;
Begin
Read(n);
for i:=1 to n do
For j:=1 to n do  begin
A[i,j]:=1/(i+j);
Write(A[i,j]:6:2);
if j=n then write;
end;
end.