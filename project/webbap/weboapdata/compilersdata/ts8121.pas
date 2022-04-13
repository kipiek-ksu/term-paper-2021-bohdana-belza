program T10z4;
Var A: set of char;
var i,k:integer; s:string; 
begin
readln(s);
K:=0;
A:=['.',',','!','?',':',';','-'];
for i:=1 to Length(S) do begin
if S[i] in A then
K:=K+1;
end;
writeln(k);
end.