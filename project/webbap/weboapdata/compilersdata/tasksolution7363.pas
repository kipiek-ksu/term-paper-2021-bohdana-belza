program L2z11;
var b,a:real;
begin
read(b);
if b>2 then begin
a:=((sqr(b)-3*b-(b-1)*sqrt(sqr(b)-4)+2)/(sqr(b)+3*b-(b+1)*sqrt(sqr(b)-4)+2))*sqrt((b+2)/(b-2));
write(a:2:4);end;
end.