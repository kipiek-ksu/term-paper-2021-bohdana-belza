Program a1;
Var s:string; i,n:integer;
Begin
Read(s);
n:=0;
For i:=1 to length(s) do
If (S[i-1]='w') and ((S[i]=',') or (S[i]='.')) then n:=n+1;
Write(n);
end.