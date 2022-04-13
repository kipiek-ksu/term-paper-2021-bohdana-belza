var i,k:integer; s:string;
begin
k:=0;
write('введите текст');
read(s);
for i:=1 to length(s) do
begin
if s[i]='w' then if s[i+1]=',' then n:=n+1;
if s[i]='w' then if s[i+1]='.' then n:=n+1;
end;
write(n);
end.
