Program pr28;
var k: string;
    i,l: integer;
BEGIN
  read(k);
  if (pos(',',Str)>0) and (Pos('d',Str)>0) then
begin
  for i:=0 to length(k) do
  if k[i]='d' then l:=l+1;
end
  else l:=0;
  write(l);
END.

