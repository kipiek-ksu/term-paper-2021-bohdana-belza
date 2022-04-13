function tochka(x1,y1,rad,x2,y2:double):boolean;
var a:real;
begin
a:=sqrt(sqr(x1-x2)+sqr(y1-y2));
if rad >= a
then tochka:=true else tochka:=false;
end;
var Mx,My,r,Cx,Cy:integer;b:boolean;
begin
read(mx,mx,r,cx,cy);
b:=tochka(mx,my,r,cx,cy);
write(b);
end.
