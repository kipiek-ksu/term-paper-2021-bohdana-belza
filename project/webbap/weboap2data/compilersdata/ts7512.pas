program L_2_60;
var a,m: integer;
    buf: string;
begin
 read(a);
 buf:=inttostr(a);
 buf:=copy(buf,2,length(buf)-1)+copy(buf,1,1);
 val(buf,m,a);
 write(m);
end.