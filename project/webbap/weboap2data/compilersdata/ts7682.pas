program z1;
var s,i:string;
r:integer;
begin
read(i);
while pos('cb',i)<>0 do begin
r:=pos('cb',i);
s:=s+copy(i,1,r);
delete(i,1,r+1);
end;
s:=s+i;
writeln(s);
end.