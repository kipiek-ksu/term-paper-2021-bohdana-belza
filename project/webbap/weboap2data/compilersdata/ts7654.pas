program tema5_27;
var s:string;
    i,n,m:integer;
begin
read(s);
m:=length(s);
n:=0;
for i:=2 to m do
if (s[i]=',') and (s[i-1]='w') then n:=n+1;
write(n);
end.