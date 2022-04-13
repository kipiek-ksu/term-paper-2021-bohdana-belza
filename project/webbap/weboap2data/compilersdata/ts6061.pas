program e;
Var m, k, I, j : integer;
S1 : string;
Begin
Readln(s1);
J:=pos(s1);
S1:=copy(s1,1,j-1)+’ ‘;
M:=0;
Repeat
I:=pos(‘ ‘,s1);
If i>1 then begin
K:=0;
For j:=1 to i-1 do
If s1[j]=’e’ then k:=k+1;
If k=3 then m:=m+1;
End;
Delete(s1,1,i)
Until i=0;
Writeln(m);
End.