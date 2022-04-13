program lab_3_37;
var n,m,k,i,j: integer;
procedure obr (s:string);
var i: integer;n:integer;
begin
n:=length(s);
for i:=1 to n do begin
if s[i]=k then write (s[i]);end;
for i:=1 to n do begin
if s[i]<>k then s[1]:=k;
write (s[i]);end;
end;
begin
read (n,m,k);
for i:=1 to n do
obr (s[i]);
for j:=1 to m do
obr (s[j]);
end.