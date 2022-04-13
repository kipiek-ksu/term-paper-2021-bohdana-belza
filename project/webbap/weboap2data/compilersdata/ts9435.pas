program p1;
var
  i,k: integer;
  s: string;
begin
  readln(s);
for i:= 1 to length (s) do
if s[i]in ['.',',','?','/','>','<',')','(','-','+','*','!'] then k:=k+1;
write (k);
end.