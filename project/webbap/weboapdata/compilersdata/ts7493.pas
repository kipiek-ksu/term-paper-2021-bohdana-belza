program Lab_2_67;
var a,b,code: integer;
    buf: string;
begin
 read(a);
 buf:=inttostr(a);
 buf:=copy(buf,1,1)+copy(buf,4,1)+copy(buf,3,1)+copy(buf,2,1);
 val(buf,b,code);
 write(b);
end.