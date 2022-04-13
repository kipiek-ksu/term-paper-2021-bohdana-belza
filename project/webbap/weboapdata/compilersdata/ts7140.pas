program z1;
var s,s2,s3,st:string;
n,i,j,k,n1:integer;
procedure rr(s,s2,s3:string);
begin
n:=length(s);
k:=0;
i:=1;
n1:=length(s2);
while pos(s2,s)<>0  do begin
j:=pos(s2,s);
st:=st+copy(s,1,j-1)+s3;
delete(s,1,j+n1-1);
i:=i+1;
end;
s:=st+s;
write(s);
end;
begin
readln(s);
readln(s2);
readln(s3);
rr(s,s2,s3);
end.
