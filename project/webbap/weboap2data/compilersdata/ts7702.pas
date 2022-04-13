program lb_23;
var
i:string;
s:string;
k:integer;
begin
readln(i);
s:=i;
k:=pos('cb',s);
while K<>0 do
begin
delete(s,k+1,1);
k:=pos('cb',s)
end;
write(s)
end.