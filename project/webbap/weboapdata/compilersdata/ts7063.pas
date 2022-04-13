
program b1;
 procedure kol(var s,ch:string);
var n,k,i:integer;
begin
 k:=0;
 for i:=1 to length(s) do
if S[i]=ch then k:=k+1;
write(k);
end;
procedure vor(var s,ch:string);
var n,i:integer;
     r,z:string;
begin
r:=s;
z:=ch;
n:=length(z);
while pos(z,r)<>0 do begin
i:=pos(z,r);
delete(r,i,n);
end;
write(r);
end;
var s,ch:string;
read(s);
read(ch);
vor(s,ch);
kol(s,ch);
end.
