Program z3;
Type Mas=array[1..100,1..100] of integer;
Var  A:Mas;
     i,j,m,k:integer;
Begin
Read(m);
For i:=1 to m do
For j:=1 to m do
Read(A[i,j]);

For i:=1 to m do
For j:=1 to m do
if (i=j) and (A[i,j]>0) then begin
k:=i;
For j:=1 to m do begin
if A[k,j]>0 then A[k,j]:=1;
If A[k,j]<0 then A[k,j]:=-1;
end;
end;
For i:=1 to m do
For j:=1 to m do begin
Write(A[i,j],' ');
if j=m then Writeln;
end;
end.


