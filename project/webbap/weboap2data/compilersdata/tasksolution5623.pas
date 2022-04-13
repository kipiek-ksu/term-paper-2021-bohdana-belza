program lr3z9;
  var b: boolean;
  Mx,My,R,Cx,Cy,g: real;
procedure Proc(var Mx,My,R,Cx,Cy: real);
  begin
  g:= sqr(Cx-Mx)+sqr(Cy-My);
  if g<>sqr(R) then
  b:=FALSE else b:=TRUE;
end;
begin
  read(Mx,My,R,Cx,Cy);
  Proc(Mx,My,R,Cx,Cy);
  write(b);
end.