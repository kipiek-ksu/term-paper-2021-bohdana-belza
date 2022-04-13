program pr4z85;
var h,w,d:real;
begin
read(h,w);
d:=(h-100)-w;
if d=0 then
write('OK');
write(d:0:2);
read(d);
end.