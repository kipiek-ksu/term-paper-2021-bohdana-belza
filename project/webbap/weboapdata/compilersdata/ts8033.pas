program T10z11;
Var A: set of char;
var i,k:integer; s:string; 
begin
readln(s);
K:=0;
A:=['a','e','i','o','u','y','A','E','I','O','U','Y'];
for i:=1 to Length(S) do begin
if S[i] not in A then
K:=K+i;
end;
writeln(k);
end.