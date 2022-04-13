Program z19;
Var s:string; i,n:integer;
Begin
Read(s);
n:=0;
if s[1]='a' then n:=1;
For i:=1 to length(s) do
if (s[i-1]=',') and (s[i]='a') then n:=n+1;
Write(n);
end.