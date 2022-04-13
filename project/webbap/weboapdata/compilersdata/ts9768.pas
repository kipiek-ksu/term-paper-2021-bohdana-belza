program z1;
type mn= set of 'a'..'z';
var z,b:mn; i,n:integer; j:char; k,l:string;
procedure sort(s:string );
var i:integer;
begin
z:=['a'..'z']-['a','e','y','o','i','u'];
for i:=1 to length(s) do
 if s[i] in z then
b:=b+[s[i]];
for j:='a' to 'z'  do
if  j in b then
write(j, ' ');
end;
begin
n:=1;
readln(k);
l[0]:=k[0];
for i:=0 to length(k) do
begin
while k[i]<> ' ' do
if i=length(k) then k[i]:=' '
else
begin
l[n]:=k[i];
n:=n+1;
i:=i+1;
end;
n:=1;
b:=[];
sort(l);
writeln;
end;
end.