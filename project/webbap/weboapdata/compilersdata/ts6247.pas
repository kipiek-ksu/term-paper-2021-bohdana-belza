program z9;
 var n,k,tmp:integer;
begin
 read(n);
 tmp:=length(n);
 while k<>n do
  begin

   k:=1+n[tmp];
   tmp:=tmp-1;
  end;
  write(k);
end.