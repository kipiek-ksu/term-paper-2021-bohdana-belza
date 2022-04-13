program l4_6;
var x,y,z,r:longint;
Begin
     readln(x,y,z);
     if (x+y+z)<x*y*z then r:=x+y+z
                      else r:=x*y*z;
     r:=sqr(r)+1;
     writeln(r);
End.