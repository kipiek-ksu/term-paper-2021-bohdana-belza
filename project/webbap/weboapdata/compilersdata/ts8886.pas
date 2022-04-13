Program z2;
Type Mas=array [1..20]of real;
     Mas2=array[1..20,1..10]of real;
Var A,B:Mas;
    C:Mas2;
    i,j:integer;
Begin
For j:=1 to 10 do
Read(A[j]);
For i:=1 to 20 do
Read(B[i]);
For i:=1 to 20 do
For j:=1 to 10 do begin
C[i,j]:=A[j]/(1+abs(B[i]));
Write (C[i,j]:8:2);
end;
end.