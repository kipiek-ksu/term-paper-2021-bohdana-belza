program ercoder;
 var s:string;n,i,m:byte;
begin
 read(s);
 n:=0;m:=0;
 for i:=1 to length(s) do
  begin
   if s[i]='.' then i:=length(s);
   if s[i]=',' then inc(m);
   if m=n then
   if s[i]='d' then inc(n);
  end;
 write(n);
end.