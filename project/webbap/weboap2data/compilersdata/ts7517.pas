program ercoder;
var i,s:string;j:byte;
begin
read(i);s:=i;
for j:=1 to length(i)-1 do
if (s[j]=' ')and(s[j+1]=' ') then
elete(s,j,1);
write(s);
end.