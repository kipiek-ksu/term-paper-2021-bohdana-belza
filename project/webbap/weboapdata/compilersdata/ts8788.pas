program z1;
var m,mi:set of char;
s:string;
i,n,k:integer;
begin
m:=['.',',',';',':','!','?','...'];
readln(s);
k:=0;
n:=length(s);
for i:=1 to n do
if s[i] in m then include(mi,s[i]);
if '.' in mi then k:=k+1;
if ',' in mi then k:=k+1;
if ';' in mi then k:=k+1;
if ':' in mi then k:=k+1;
if '!' in mi then k:=k+1;
if '?' in mi then k:=k+1;
if '...' in mi then k:=k+1;
write(k);
end.