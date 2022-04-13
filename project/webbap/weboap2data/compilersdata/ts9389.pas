program z1;
var m: set of char;
s,st:string;
a:array[1..200] of string;
i,j,n,z:integer;
begin
m:=['A'..'Z'];
readln(s);
s:=s+' ';
i:=1;
while pos(' ',s)<>0 do begin
j:=pos(' ',s);
a[i]:=copy(s,1,j-1);
delete(s,1,j);
i:=i+1;
end;
for j:=1 to i-1 do begin
st:=a[j];
if st[1] in m then z:=z+1;
end;
write(z);
end.

