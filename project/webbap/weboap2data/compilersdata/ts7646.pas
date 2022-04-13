program L_1_9;
var a,b,k: integer;
    buf,buf1: string;
begin
 read(a);
 buf:=inttostr(a);
 for k:=length(buf) downto 1 do
  buf1:=buf1+copy(buf,k,1);
 val(buf1,b,k);
 write(b);
end.