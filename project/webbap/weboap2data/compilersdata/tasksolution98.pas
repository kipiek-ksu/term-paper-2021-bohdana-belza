Program ifThen;
var x,y,z,r,t,w:integer;
Begin
  Read(x,y,z);
  t:=x+y+z;
  r:=x*y*z;
  If r<t then
    w:=sqr(r)+1
    else w:=sqr(t)+1;
  Write(w);
End.