program t2_24;
var r,r2: real;
begin
 read(r);
 r2:=r*tan(pi*60/180)*tan(pi*((180-120)/4)/180);
 write(r2:0:3);
end.