program jh8;
var x1,x2,y1,y2,k: real;
procedure kl(dx1, dy1, dx2, dy2: real);
begin
  k:=sqrt(sqr(dx2-dx1)+sqr(dy2-dy1));
end;
begin
  read(x1, y1, x2, y2);
  kl(x1, y1, x2, y2);
  write(d:0:2);
end.