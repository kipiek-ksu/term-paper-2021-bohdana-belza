Program Lab8;
Const n=255;
Var A,P:set of 1..n;
    i,m,t,j:integer;
Begin
Clrscr;
A:=[2..n];
P:=[];
m:=1;
While A<>[] do begin
While not (m in A) do
m:=m+1;
P:=P+[ m];
t:=n div m;
For i:=1 to t do
A:=A-[i*m];
end;